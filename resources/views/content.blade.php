<script>
    var card_counter = 0
    var menu_counter = 0
</script>

<div class="container">
    <div class="row card-container mb-3" style="display: flex; justify-content: center;">
        <div class="col-lg-6" style="border-radius: 30px">
            <button style="position: absolute; padding-top: 2px; padding-bottom: 2px; margin-top: 16px" class="btn btn-danger" onclick="deleteCard(this)">x</button>
            <div class="card-service border shadow" style="max-width: initial">
                <div class="header" style="margin: 0">
                    <input class="form-control" style="border-radius: 30px; justify-content: center; text-align: center" placeholder="Nama Pemesan" type="text">
                </div>
                <hr>
                <div class="body" id="input-body1">
                    <div class="input-group mb-1" id="input-group1" data-menu-counter="1">
                        <input class="form-control" size="40" style="width: 35%; font-size: 15px; height: 30px; border-top-left-radius: 30px; border-bottom-left-radius: 30px; justify-content: center; text-align: center" placeholder="Nama Menu" type="text">
                        <input class="form-control" size="40" style="width: 20%; font-size: 15px; height: 30px; justify-content: center; text-align: center" placeholder="Harga" type="number">
                        <input class="form-control" size="20" style="font-size: 15px; height: 30px; border-top-right-radius: 30px; border-bottom-right-radius: 30px; justify-content: center; text-align: center" placeholder="Jml" type="number">
                        
                        <button onclick="deleteMenu(this)" type="button" class="ml-3 close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <button onclick="menuAdder(this)" class="btn btn-success mai-add add_menu" style="border-radius: 40px;"></button>
                </div>
            </div>
        </div>
        <div id="card_adder" style="display: flex; justify-content: center; margin: auto 0;">
            <button class="btn btn-primary" style="max-height: 100px; max-width: 100px" onclick="cardAdder()">Tambah Orang</button>
        </div>
    </div>
    <span style="width: 100%">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:none;" width="50px" height="50px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#00d5ff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
            </circle>
        </svg>
        <button class="btn btn-info calculate" style="width: 100%" data-toggle="modal" data-target="#calculateModal">
            <span class="mai-calculator"></span>
            Kalkulasi
        </button>
    </span>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function cardAdder() {
        $('#card_adder').replaceWith(`
            <div class="col-lg-6 wow fadeIn" style="z-index:5; border-radius: 30px" id="card${card_counter}">
                <button style="position: absolute; padding-top: 2px; padding-bottom: 2px; margin-top: 16px" class="btn btn-danger" onclick="deleteCard(this)">x</button>
                <div class="card-service border shadow" style="max-width: initial">
                    <div class="header" style="margin: 0">
                        <input class="form-control" style="border-radius: 30px; justify-content: center; text-align: center" placeholder="Nama Pemesan" type="text">
                    </div>
                    <hr>
                    <div class="body" id="input-body${card_counter}">
                        <div class="input-group mb-1" id="input-group${card_counter}">
                            <input class="form-control" size="40" style="width: 35%; font-size: 15px; height: 30px; border-top-left-radius: 30px; border-bottom-left-radius: 30px; justify-content: center; text-align: center" placeholder="Nama Menu" type="text">
                            <input class="form-control" size="40" style="width: 20%; font-size: 15px; height: 30px; justify-content: center; text-align: center" placeholder="Harga" type="number">
                            <input class="form-control" size="20" style="font-size: 15px; height: 30px; border-top-right-radius: 30px; border-bottom-right-radius: 30px; justify-content: center; text-align: center" placeholder="Jml" type="number">
                            
                            <button onclick="deleteMenu(this)" type="button" class="ml-3 close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <button onclick="menuAdder(this)" class="btn btn-success mai-add add_menu" style="border-radius: 40px;"></button>
                    </div>
                </div>
            </div>
            <div id="card_adder" style="display: flex; justify-content: center; margin: auto 0;">
                <button class="btn btn-primary" style="max-height: 100px; max-width: 100px" onclick="cardAdder()">Tambah Orang</button>
            </div>
        `)
        card_counter += 1
    }
    function menuAdder(e) {
        $(e).replaceWith(`
            <div class="input-group mb-1" id="input-group${this.card_counter}">
                <input class="form-control" size="40" style="width: 35%; font-size: 15px; height: 30px; border-top-left-radius: 30px; border-bottom-left-radius: 30px; justify-content: center; text-align: center" placeholder="Nama Menu" type="text">
                <input class="form-control" size="40" style="width: 20%; font-size: 15px; height: 30px; justify-content: center; text-align: center" placeholder="Harga" type="number">
                <input class="form-control" size="20" style="font-size: 15px; height: 30px; border-top-right-radius: 30px; border-bottom-right-radius: 30px; justify-content: center; text-align: center" placeholder="Jml" type="number">
                
                <button onclick="deleteMenu(this)" type="button" class="ml-3 close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <button onclick="menuAdder(this)" class="btn btn-success mai-add add_menu" style="border-radius: 40px;"></button>
        `)
    }
    function deleteCard(e) {
        $(e).closest('.col-lg-6').remove()
    }
    function deleteMenu(e) {
        $(e).closest(`.input-group`).remove()
    }

    $('.calculate').on('click', function() {
        var data = []
        var promo = {}
        var divs = document.querySelectorAll('.card-container').forEach(function(el) {
            el.querySelectorAll('.col-lg-6').forEach(function(card) {
                var person = card.querySelector('.header input').value
                var individual = {
                    person: person,
                    order: []
                }
                
                var inputLine = card.querySelectorAll('.body div')
                
                inputLine.forEach(function(line) {
                    individual.order.push({
                        food: line.querySelectorAll('input')[0].value,
                        price: line.querySelectorAll('input')[1].value,
                        number: line.querySelectorAll('input')[2].value
                    })
                })
                data.push(individual)
            })
        })
        promo.min_price = document.querySelectorAll('.container_promo div input')[0].value
        promo.discount_percentage = document.querySelectorAll('.container_promo div input')[1].value
        promo.max_amount_discount = document.querySelectorAll('.container_promo div input')[2].value
        promo.shipping_cost = document.querySelectorAll('.container_promo div input')[3].value
        // console.log(data)
        // console.log(promo)

        $('.calculate').css('display', 'none')
        $('svg').css('display', 'block')

        $.ajax({
            url: "{{ route('save-calculation') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                data: data,
                promo: promo
            },
            success: function(res) {
                console.log(res)
                $.ajax({
                    url: "{{ route('get-calculation') }}",
                    type: "GET",
                    data: {
                        id: res
                    },
                    success: function(res) {
                        var cards = ``
                        res.bill.forEach(detail => {
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
                            })
                            cards += `          <hr>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `
                        })
                        $('.calculated').html(cards)

                        $('svg').css('display', 'none')
                        $('.calculate').css('display', 'block')
                    }
                })
            }
        })
    })
</script>