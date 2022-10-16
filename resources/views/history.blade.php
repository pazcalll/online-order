<div class="container history-container">
    
</div>

<!-- Modal -->
<div class="modal fade" id="calculateModal" tabindex="-1" aria-labelledby="calculateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calculateModalLabel">Hasil Penghitungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid row calculated">

                </div>
            </div>
            <div class="modal-footer">
                <span style="margin-right: auto">
                    Total Tagihan: 
                    <span class="bill-total" class="mr-1" data-actual-bill=""></span>
                    <span class="bill-total-discount" data-discount=""></span>
                </span>
                (termasuk ongkir <span class="bill-shipping-cost" data-shipping-cost=""></span>)
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    $.ajax({
        url: "{{ route('get-all-history') }}",
        type: "GET",
        success: function (res) {
            $('.history-container').html(`
                <div class="row history-cards">
                    
                </div>
            `);
            res.forEach(data => {
                $('.history-cards').append(`
                    <div class="col-4" style="margin-top: 5px; margin-bottom: 5px;">
                        <svg class="svg-${data.note}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width:inherit;margin:0 auto;background:#fff; display: none;" width="50px" height="50px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="50" cy="50" fill="none" stroke="#00d5ff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                            </circle>
                        </svg>
                        <div class="card card-${data.note}" onClick="showHistory(\'${data.id}\', \'${data.note}\')">
                            <div class="card-body btn btn-info">
                                <p>Riwayat Pembelian</p>
                                <p>${data.note}</p>
                            </div>
                        </div>
                    </div>
                `)
            });
        }
    })

    function showHistory(id, note) {
        $('.card-'+note).css('display', 'none')
        $('.svg-'+note).css('display', 'block')
        $.ajax({
            url: "{{ route('get-calculation') }}",
            type: "GET",
            data: {
                id: id
            },
            success: function(res) {
                var cards = ``
                var calculateTotal = 0
                res.bill.forEach((detail, _index) => {
                    cards += `
                        <div class="col-lg-6" style="border-radius: 30px">
                            <div class="card-service border shadow" style="max-width: initial">
                                <div class="header" style="margin: 0">
                                    <strong>${detail.person}</strong>
                                </div>
                                <hr>
                                <div class="body" id="input-body1">
                                    <div class="row" mb-1" >
                                `
                    var cardTotal = 0
                    detail.orders.forEach(order => {
                        cards += `
                                        <span class="col-4">
                                            ${order.food}
                                        </span>
                                        <span class="col-4">
                                            ${order.price} X ${order.number}
                                        </span>
                                        <span class="col-4">
                                            ${order.price*order.number}
                                        </span>
                                        <br>
                        `
                        cardTotal += order.price*order.number
                    })
                    cards += `          
                                    </div>
                                    <hr>
                                    <span style="display: none" class="card-val-${_index}" data-card="${cardTotal}"></span>
                                    <span class="col-6">Sub-Total:</span>
                                    <span class="col-6 card${_index}">
                                        <span class="mr-1">${cardTotal+(res.promo.shipping_cost/res.bill.length)}</span>
                                        <span></span>
                                        <span> (termasuk ongkir)</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        `
                    calculateTotal += cardTotal
                })
                $('.bill-total').html(calculateTotal+parseFloat(res.promo.shipping_cost))
                $('.bill-total').data('actual-bill', calculateTotal+parseFloat(res.promo.shipping_cost))
                $('.calculated').html(cards)

                console.log($('.bill-total').data('actual-bill'))
                console.log(res.promo)

                $('#calculateModal').modal('show')

                $('svg').css('display', 'none')
                $('.calculate').css('display', 'block')
                
                var discount = 0
                var calculateTotalDiscount = 0
                if (calculateTotal >= res.promo.min_price) {
                    discount = calculateTotal*(res.promo.percentage_discount/100)
                    if (discount <= res.promo.max_amount_discount) {
                        res.bill.forEach((detail, _index) => {
                            var cardTotalDiscount = 0
                            detail.orders.forEach(order => {
                                cardTotalDiscount += order.price*order.number*(res.promo.percentage_discount/100)
                            })
                            // console.log(document.querySelector(`.card${_index}`).querySelectorAll('span'))
                            document.querySelector(`.card${_index}`).querySelectorAll('span')[0].style.textDecoration = "line-through"
                            calculateTotalDiscount+=cardTotalDiscount
                        })
                        res.bill.forEach((detail, _index) => {
                            document.querySelector(`.card${_index}`).querySelectorAll('span')[1].innerHTML = parseFloat($(`.card-val-${_index}`).data('card')) - (parseFloat($(`.card-val-${_index}`).data('card')) * (res.promo.percentage_discount/100)) + res.promo.shipping_cost / res.bill.length
                        })
                        document.querySelector('.bill-total').style.textDecoration = "line-through"
                        document.querySelector(`.bill-total-discount`).innerHTML = parseFloat($('.bill-total').data('actual-bill'))-calculateTotalDiscount
                        $('.bill-total-discount').data('discount', calculateTotalDiscount)
                        console.log(`data-discount=${$('.bill-total-discount').data('discount')}`)
                    } else if (discount > res.promo.max_amount_discount) {
                        res.bill.forEach((detail, _index) => {
                            var cardTotalDiscount = 0
                            detail.orders.forEach(order => {
                                cardTotalDiscount += order.price*order.number
                            })
                            document.querySelector(`.card${_index}`).querySelectorAll('span')[0].style.textDecoration = "line-through"
                            calculateTotalDiscount+= ((cardTotalDiscount/($('.bill-total').data('actual-bill')-res.promo.shipping_cost))*res.promo.max_amount_discount)
                        })
                        res.bill.forEach((detail, _index) => {
                            var cardTotal = parseFloat($(`.card-val-${_index}`).data('card'))
                            var billWithShipping = parseFloat($('.bill-total').data('actual-bill'))
                            document.querySelector(`.card${_index}`).querySelectorAll('span')[1].innerHTML = cardTotal - (cardTotal / (billWithShipping - res.promo.shipping_cost) * res.promo.max_amount_discount) + res.promo.shipping_cost / res.bill.length
                        })
                        document.querySelector('.bill-total').style.textDecoration = "line-through"
                        document.querySelector(`.bill-total-discount`).innerHTML = parseFloat($('.bill-total').data('actual-bill'))-calculateTotalDiscount
                        $('.bill-total-discount').data('discount', calculateTotalDiscount)
                    }
                }
                $('.bill-shipping-cost').data('shipping-cost', res.promo.shipping_cost)
                $('.bill-shipping-cost').html(res.promo.shipping_cost)
                $('#calculateModal').modal('show')
            },
            error: function (err) {
                Toastify({
                    text: "Aksi gagal, harap muat ulang halaman!",
                    duration: 3000,
                    className: "error",
                    style: {
                        background: "#ff0000",
                    }
                }).showToast()
            },
            complete: function () {
                $('.svg-'+note).css('display', 'none')
                $('.card-'+note).css('display', 'flex')
            }
        })
    }
</script>