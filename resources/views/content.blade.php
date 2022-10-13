<script>
    var card_counter = 0
    var menu_counter = 0
</script>

<div class="container">
    <div class="row card-container mb-3" style="display: flex; justify-content: center;">
        <div class="col-lg-6" style="border-radius: 30px" id="card1">
            <button style="position: absolute; padding-top: 2px; padding-bottom: 2px; margin-top: 16px" class="btn btn-danger" onclick="deleteCard(this)">x</button>
            <div class="card-service border shadow" style="max-width: initial">
                <div class="header" style="margin: 0">
                    <input class="form-control" style="border-radius: 30px; justify-content: center; text-align: center" placeholder="Nama Pemesan" type="text" name="name" id="name">
                </div>
                <hr>
                <div class="body" id="input-body1">
                    <div class="input-group mb-1" id="input-group1" data-menu-counter="1">
                        <input class="form-control" size="40" style="width: 35%; font-size: 15px; height: 30px; border-top-left-radius: 30px; border-bottom-left-radius: 30px; justify-content: center; text-align: center" placeholder="Nama Menu" type="text" name="menu1" id="menu1">
                        <input class="form-control" size="40" style="width: 25%; font-size: 15px; height: 30px; justify-content: center; text-align: center" placeholder="Harga" type="text" name="price1" id="price1">
                        <input class="form-control" size="20" style="font-size: 15px; height: 30px; border-top-right-radius: 30px; border-bottom-right-radius: 30px; justify-content: center; text-align: center" placeholder="Jml" type="number" name="amount1" id="amount1">
                        
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
    <div class="row" style="position: sticky; ">
        <button class="btn btn-info" style="width: 100%">
            <span class="mai-calculator"></span>
            Kalkulasi
        </button>
    </div>
</div>

<script>
    function cardAdder() {
        $('#card_adder').replaceWith(`
            <div class="col-lg-6" style="border-radius: 30px" id="card${card_counter}">
                <button style="position: absolute; padding-top: 2px; padding-bottom: 2px; margin-top: 16px" class="btn btn-danger" onclick="deleteCard(this)">x</button>
                <div class="card-service border shadow" style="max-width: initial">
                    <div class="header" style="margin: 0">
                        <input class="form-control" style="border-radius: 30px; justify-content: center; text-align: center" placeholder="Nama Pemesan" type="text" name="name${card_counter}" id="name${card_counter}">
                    </div>
                    <hr>
                    <div class="body" id="input-body${card_counter}">
                        <div class="input-group mb-1" id="input-group${card_counter}">
                            <input class="form-control" size="40" style="width: 35%; font-size: 15px; height: 30px; border-top-left-radius: 30px; border-bottom-left-radius: 30px; justify-content: center; text-align: center" placeholder="Nama Menu" type="text" name="menu${card_counter}" id="menu${card_counter}">
                            <input class="form-control" size="40" style="width: 25%; font-size: 15px; height: 30px; justify-content: center; text-align: center" placeholder="Harga" type="text" name="price${card_counter}" id="price${card_counter}">
                            <input class="form-control" size="20" style="font-size: 15px; height: 30px; border-top-right-radius: 30px; border-bottom-right-radius: 30px; justify-content: center; text-align: center" placeholder="Jml" type="number" name="amount${card_counter}" id="amount${card_counter}">
                            
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
        console.log(e)
        $(e).replaceWith(`
            <div class="input-group mb-1" id="input-group${this.card_counter}">
                <input class="form-control" size="40" style="width: 35%; font-size: 15px; height: 30px; border-top-left-radius: 30px; border-bottom-left-radius: 30px; justify-content: center; text-align: center" placeholder="Nama Menu" type="text" name="menu${this.card_counter}" id="menu${this.card_counter}">
                <input class="form-control" size="40" style="width: 25%; font-size: 15px; height: 30px; justify-content: center; text-align: center" placeholder="Harga" type="text" name="price${this.card_counter}" id="price${this.card_counter}">
                <input class="form-control" size="20" style="font-size: 15px; height: 30px; border-top-right-radius: 30px; border-bottom-right-radius: 30px; justify-content: center; text-align: center" placeholder="Jml" type="number" name="amount${this.card_counter}" id="amount${this.card_counter}">
                
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
</script>