
var prod_array = []; // ADD PRODUCTS TO ARRAY
var array_products = [];
var dataParse = [];
var productKey = 0;
var numpadKey = 0;

//Get Categories
function getCategories() {
    console.log('test');
    let url = ('http://house.evos.uz/api/request/groups');
    let select_cat = $('div[name="groups"]');
    select_cat.html('');
    try {
        $.get(url, function (data, status) {
            if (status != 'success') {
                //alert('Error request:' + status);
            } else {
                let result = JSON.parse(data);
                let _id = result.rid;
                let categories = result.categories;
                select_cat.append('<h1>Выберите категорию</h1>');
                for (let i = 0; i < categories.length; i++) {
                    select_cat.append(`<a href="#ex2"><button id="${_id[i]}" onclick="get_prod_by_id(this.id)" style="margin:10px;" class="btn btn-success btn-lg" value="${_id[i]}">${categories[i]}</button></a>`);
                }

            }

        });
    } catch (e) {
        //alert(e)
    }
}


//Get Departments
function getDepartments() {
    let url = ('http://house.evos.uz/api/request/customer');
    let select_departments = $('div[name="departments"]');
    select_departments.html('');
    try {
        $.get(url, function (data, status) {
            if (status != 'success') {
                //alert('Error request:' + status);
            } else {
                let result = JSON.parse(data);
                let _id = result.id;
                let departments = result.name;
                select_departments.append('<h1>Выберите подразделение</h1>');
                for (let i = 0; i < departments.length; i++) {
                    select_departments.append(`<a data-toggle="offcanvas" href="#xdepartment" name="${departments[i]}" onclick="sendInputDepartment(this.name)" rel="modal:close"><button id="${_id[i]}" style="margin:10px;" class="btn btn-success btn-lg" value="${_id[i]}">${departments[i]}</button></a>`);
                }

            }
        });
    } catch (e) {
        //alert(e)
    }
}

//Get ExDepartments
function getExDepartments() {
    let url = ('http://house.evos.uz/api/request/customer');
    let select_exdepartments = $('div[name="exdepartments"]');
    select_exdepartments.html('');
    try {
        $.get(url, function (data, status) {
            if (status != 'success') {
                //alert('Error request:' + status);
            } else {
                let result = JSON.parse(data);
                let _id = result.id;
                let exdepartments = result.name;
                select_exdepartments.append('<h1>Выберите место реализации</h1>');
                for (let i = 0; i < exdepartments.length; i++) {
                    select_exdepartments.append(`<a data-toggle="offcanvas" href="#exdepartment" name="${exdepartments[i]}" onclick="sendInputExdepartment(this.name)" rel="modal:close"><button id="${_id[i]}" style="margin:10px;" class="btn btn-success btn-lg" value="${_id[i]}">${exdepartments[i]}</button></a>`);
                }

            }
        });
    } catch (e) {
        //alert(e)
    }
}

// Send input
function sendInputDepartment(department) {
    $('input[name="department-proposal"]').val(department);
}

// Send input
function sendInputExdepartment(department) {
    console.log(department);
    $('input[name="exdepartment-proposal"]').val(department);
}



//Get products by Category id
function get_prod_by_id(get_id) {
    $('div[id="ex2"]').modal({
        escapeClose: false,
        clickClose: false,
        showClose: false,
    });

    let url = ('http://house.evos.uz/api/request/goods'
    );
    let goods_id = get_id;
    let select_product = $('div[id="ex2"]');
    select_product.html('');
    try {
        $.ajax({
            type: "POST",
            url: url,
            data: { "id": goods_id },
            cache: false,
            success: function (data) {
                dataParse = JSON.parse(data);
                $('#ex2').panelMultiSelect({
                    dataSource: dataParse
                });
                select_product.append('<h1 style="margin-top:5%";>Выберите товар</h1>');
                select_product.append('<a href="#close-modal" rel="modal:close" data-toggle="offcanvas" onclick="output_products_evos()"><span style="position:absolute;top:0; right:5px; margin:2px;" class="btn btn-lg btn-info pull-right">ДОБАВИТЬ ТОВАРЫ</span></a>');
                select_product.append('<a href="#close-modal" data-toggle="offcanvas" rel="modal:close" style="position:absolute; left: 5px; top:0;"><span style="margin:2% 0 2% 0;" class="btn btn-danger btn-lg pull-left" id="add_request_evos" >ЗАКРЫТЬ</span></a>');
                select_product.append('<a href="#ex_one" rel="modal:open" style="position:absolute; left: 120px; top:12px;"><span style="margin:2% 0 2% 0;" class="btn-xs-custom btn-lg btn-primary" id="add_request_evos" >Назад в категорию</span></a>');
            }
        });

    } catch (e) {
        //alert(e)
    }

}

function pushProductsToArray(id, name) {
    $('table[class="table-modal"]').remove();
    let count = $(`input[id = "count_prod_${id}"]`).val();
    let type = dataParse.find(t => t.id === Number(id));
    $('input[id = "count_prod"]').remove();
    $('input[id = "text-basic"]').remove();
    $('input[class = "btn-customer"]').remove();

    prod_array.push({
        name: name,
        id: id,
        count: count,
        type: type.type
    });
}


//Output products list
function output_products_evos() {
    for (let i = 0; i < prod_array.length; i++) {

        $(".evos_list").append(`
        <tr id="tr_${prod_array[i].id}">
        <td name="id_${i}">${prod_array[i].id}</td><td name="name_${i}">${prod_array[i].name}</td>
        <td name="count_${i}"><input type="number" name="count_${i}" id="input_${prod_array[i].id}" datakey="tr_${prod_array[i].id}" class="form-control nmpd-target" placeholder="Кол-во" data-numpad="nmpd1"></td>
        <td name="type_${i}">${prod_array[i].type}</td>
        <td><a id="${prod_array[i].id}" href="#ex_one" data-toggle="offcanvas" rel="modal:open" onclick="edit_prod(this.id)"><button class="btn btn-info" id="add_request_evos_${i}" >РЕДАКТИРОВАТЬ</button></a>
        <button class="btn btn-danger" datakey="tr_${prod_array[i].id}" (numpadkey="input_${prod_array[i].id}" id="btn_${prod_array[i].id}" onclick="delete_prod(${prod_array[i].id},${i})" type="submit" class="delete">УДАЛИТЬ
        </button></td>
        </tr>`);

        $.fn.numpad.defaults.gridTpl = '<table class="table table-modal modal-content"></table>';
        $.fn.numpad.defaults.backgroundTpl = '<div class="modal-backdrop in"></div>';
        $.fn.numpad.defaults.displayTpl = `<input  type="number" id="count_prod_${i}" class="form-control" />`;
        $.fn.numpad.defaults.buttonNumberTpl = `<button type="button" class="btn btn-default" style="padding:15px 21px;"></button>`;
        $.fn.numpad.defaults.buttonFunctionTpl = `<button type="button" class="btn" style="width: 100%; padding:15px 21px;" onclick = "pushCountProductsToArray(${i})"></button>`;
        $.fn.numpad.defaults.onKeypadCreate = function () { $(this).find('.done').addClass('btn-primary'); };
        $(`#input_${prod_array[i].id}`).numpad();
    }

    array_products = array_products.concat(prod_array);
    prod_array = [];
}

function pushCountProductsToArray (id) {
    let inputValue = $(`input[id=count_prod_${id}]`).val();
    array_products[id].count = inputValue;
    console.log(array_products[id].count);
    validation_count();
}

function validation_count() {
    if(array_products.some(p => p.count === undefined )) {
        $('button[id=buttonSubmitProduct]').prop('disabled', true);
    } else if (array_products.some(p => p.count == 0 )) {
        $('button[id=buttonSubmitProduct]').prop('disabled', true);
    } else {
        $('button[id=buttonSubmitProduct]').prop('disabled', false);
    }
}

// SEND PRODUCTS TO CONTROLLER
function sendDataProposal () {
    let allData = [];

    let str = $("#serializeForm").serialize();
    
    const serializeToJSON = str => 
  str.split('&')
    .map(x => x.split('='))
    .reduce((acc, [key, value]) => ({
      ...acc,
      [key]: isNaN(value) ? value : Number(value)
    }), {})

    let strNew = serializeToJSON(str);
    let obj = {};
    let allObject = [];
    let result = {};    

    $('.evos_list tr').each(function(index) {
        obj.id = $(`td[name = "id_${index}"]`).text();
        obj.name = $(`td[name = "name_${index}"]`).text();
        obj.count = $(`td[name = "count_${index}"]`).text();
        obj.type = $(`td[name = "type_${index}"]`).text();
        allObject.push(obj);
    });

    result.products = allObject;
    result.proposal = strNew;

    let url_prod = ('http://crm.local/admin/sendcomingproducts');
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url_prod,
        type: 'POST',
        data: result,
        cache: false,
        success: function () {
            console.log('result');
        },
        error: function (err) {
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        }
    }).always(function (jqXHR, textStatus) {
        if (textStatus != "success") {
            console.log("Error: " + jqXHR.statusText);
        }
    })

}

// Delete product on List
function delete_prod(value, index) {
    prod_array.splice(index, 1);
    array_products.splice(index,1);
    index--;
    $(`.evos_list tr#tr_${value}`).remove();
    $(`.evos_list input#input_${value}`).remove();
}

// Delete product on Modal
function delete_prod_on_modal(index) {
    prod_array.splice(index, 1);
    index--;
}

//Edit products
function edit_prod(value) {
    $(`.evos_list tr#tr_${value}`).remove();
    prod_array.remove

}