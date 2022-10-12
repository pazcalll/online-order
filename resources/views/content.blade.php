<script>
    var card_counter = 1
</script>

<div class="container">
    <div class="row card-container" style="display: flex; justify-content: center;">
        <div class="col-lg-4" id="card1">
            <div class="card-service">
                <div class="header">
                    <input class="form-control" style="justify-content: center; text-align: center" placeholder="Nama Pemesan" type="text" name="name" id="name">
                </div>
                <hr>
                <div class="body">
                </div>
            </div>
        </div>
        <div id="card_adder" style="display: flex; justify-content: center; margin: auto 0;">
            <button class="btn btn-primary" style="max-height: 100px; max-width: 100px" onclick="cardAdder()">Tambah Orang</button>
        </div>
    </div>
</div>

<script>
    function cardAdder() {
        $('#card_adder').remove();
        $('.card-container').append(`
            <div class="col-lg-4 wow fadeInUp" id="card${card_counter}">
                <div class="card-service">
                    <div class="header">
                        <input class="form-control" style="justify-content: center; text-align: center" placeholder="Nama Pemesan" type="text" name="name" id="name">
                    </div>
                    <hr>
                    <div class="body">
                    </div>
                </div>
            </div>
            <div id="card_adder" style="display: flex; justify-content: center; margin: auto 0;">
                <button class="btn btn-primary" style="max-height: 100px; max-width: 100px" onclick="cardAdder()">Tambah Orang</button>
            </div>
        `);
    }
</script>