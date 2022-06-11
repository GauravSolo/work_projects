var id = 2;
var totalAmount = 0;
var totalDiscount = 0;
var totalGST = 0;
function addProduct() {
    $("select:last").addClass("js-example-basic-single");
    $("#products_container").append(`
               <div class="d-flex product_row" style="flex-wrap:nowrap;overflow:auto;" id="element_${id}">
                            <div class="d-flex flex-column align-items-center" style="min-width:100px;" id="general_div_${id}">
                                <label style="white-space:nowrap;">General</label>
                                <input type="checkbox"  class="general_select" name="general" id="general_${id}">
                            </div>
                            <div class="ml-3" style="min-width:350px;display:none;" id="general_product_description_div_${id}">
                                <label style="white-space:nowrap;" style="color: gray">Product Description</label>
                                <input type="text" name="Description[]" id="general_product_description_${id}" class="form-control">
                            </div>
                            <div class="ml-3" style="min-width:150px;" id="product_div_${id}">
                                <label style="white-space:nowrap;">Product</label>
                                <select id="product_${id}" name="Item2[]" class="js-example-basic-single error form-control product_select">
                                    <option disabled selected>Select Product</option>
                                </select>
                            </div>
                            <div class="ml-3" style="min-width:175px;" id="sub-product_div_${id}">
                                <label style="white-space:nowrap;">Sub-Product</label>
                                <select id="sub-product_${id}" name="Item[]" class="js-example-basic-single error form-control sub-product_select">
                                    <option disabled selected>Select Sub-Product</option>
                                </select>
                            </div>
                            <div class="ml-3" style="min-width:115px;">
                                <label style="white-space:nowrap;">Staff</label>
                                <select id="staff_${id}" name="Service_Person[]" class="js-example-basic-single error form-control staff_select">
                                    <option disabled selected>Select Staff</option>
                                </select>
                            </div>
                            <div class="ml-3" style="min-width:100px;">
                                <div class="form-group">
                                    <label style="white-space:nowrap;">Price</label>
                                    <input type="number" name="price[]" class="form-control price_input" value="0" id="price_${id}">
                                </div>
                            </div>
                            <div class="ml-3" style="min-width:100px;">
                                <div class="form-group">
                                    <label style="white-space:nowrap;">Quantity</label>
                                    <input type="number" name="quantity[]" id="quantity_${id}" class="form-control quantity_input" value="1" >
                                </div>
                            </div>
                            <div class="ml-3" style="min-width:100px;">
                                <div class="form-group">
                                <label style="white-space:nowrap;" style="white-space:nowrap;">GST(%)</label>
                                    <input  type="number" name="gst[]" id="gst_${id}" class="form-control gst_input" value="0" min="0">
                                    <input type="number" id="gst_price_${id}" class="form-control" value="0" min="0" hidden>
                                </div>
                            </div>
                            <div class="ml-3" style="min-width:100px;">
                                <div class="form-group">
                                    <label style="white-space:nowrap;">Final</label>
                                    <input type="number" name="final_rate[]" id="final_rate_${id}" class="form-control final_input" value="0">
                                    <input type="number" id="final_rate_product_${id}" class="form-control final_input_product" value="0" hidden>
                                    <input type="number" id="final_rate_sub_${id}" class="form-control final_input_sub" value="0" hidden>
                                </div>
                            </div>
                            <div class="ml-3" style="min-width:100px;">
                                <div class="form-group">
                                    <label style="white-space:nowrap;" >Disc(Rs)</label>  
                                    <input type="number" class="form-control discount_price_input" value="0" min="0" id="discountrupees_${id}">
                                </div>
                            </div>
                            <div class="ml-3" style="min-width:100px;">
                                <div class="form-group">
                                    <label style="white-space:nowrap;">Disc(%)</label>
                                    <input type="number" name="discount[]" id="discount_${id}" class="form-control discount_input" value="0" min="0">
                                    <input type="number" id="discount_price_${id}" class="form-control" value="0" min="0" hidden>
                                </div>
                            </div>
                            <div class="ml-3 mt-2 d-flex justify-content-center align-items-center" style="min-width:100px;">
                                <button onclick="deleteProduct(${id})" type="button" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
    `);
    getAndSetProducts(id);
    getAndSetStaffs(id);
    $('.js-example-basic-single').select2();
    id++;
}
function deleteProduct(delete_id) {
    var elements = document.getElementsByClassName("product_row");
    updateFinal("finalTotal", "-" + $("#final_rate_" + delete_id).val());
    updateFinal("finalTotalTotal", "-" + $("#final_rate_product_" + delete_id).val());
    updateFinal("totalDiscount", "-" + $("#discount_price_" + delete_id).val());
    updateFinal("discount", "-" + $("#discount_price_" + delete_id).val());
    updateFinal("totalGst", "-" + $("#gst_price_" + delete_id).val() * 2);
    updateFinal("cgst", "-" + ($("#gst_price_" + delete_id).val()));
    updateFinal("sgst", "-" + ($("#gst_price_" + delete_id).val()));
    updatePayments();
    if (elements.length != 1) {
        $("#element_" + delete_id).remove();
        return;
    }
    if (elements.length == 1) {
        $("#element_" + delete_id).remove();
        addProduct();
    }
}
function toggleHeader() {
    if (document.getElementById("expand-btn").classList.contains('fa-arrow-down')) {
        $("#expand-header").css('display', 'block');
        document.getElementById("expand-btn").classList.remove('fa-arrow-down');
        document.getElementById("expand-btn").classList.add('fa-arrow-up');
    } else {
        $("#expand-header").css('display', 'none');
        document.getElementById("expand-btn").classList.remove('fa-arrow-up');
        document.getElementById("expand-btn").classList.add('fa-arrow-down');
    }
}
var clickonfinal = 0;
$(document).ready(function () {
    $.ajax({
        url: "https://riseretail.net/web/routing.php",
        method: 'POST',
        data: {
            getNextInvoiceId: true
        },
        dataType: 'json',
        success: function (invoice_id) {
            $("#invoice_id").val(invoice_id);
        }
    });
    getAndSetProducts(1);
    getAndSetStaffs(1);
    var today = new Date();
    $("#igst-checkbox").on('click', function () {
        if (this.checked)
        {
            updatePayments();
            $("#cgst").prop('disabled', true);
            $("#sgst").prop('disabled', true);
            $("#igst").prop('disabled', true);
            $("#cgst").val(0);
            $("#sgst").val(0);
            $("#igst").val($("#totalGst").val());
        } else {
            oldIgstValue = $("#igst").val();
            oldTotalGst = $("#totalGst").val();
            $("#igst").val(0);
            var gst = $("#totalGst").val() / 2;
            $("#cgst").val(+gst);
            $("#sgst").val(+gst);
//            updateFinal("totalGst", ($("#igst").val() - oldIgstValue));
//            updateFinal("finalTotal", ($("#totalGst").val() - oldTotalGst));
            $("#cgst").prop('disabled', true);
            $("#sgst").prop('disabled', true);
            $("#igst").prop('disabled', true);
        }
    });
    document.getElementById("invoice_date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
    $("#products_container").on('click', '.general_select', function () {
        var element_id = $(this).attr("id").split('_')[1];
        if ($(this)[0].checked) {
            $("#product_div_" + element_id).hide();
                $("#sub-product_div_" + element_id).hide();
                $("#general_product_description_div_" + element_id).show();
//            clearAll(element_id);
//            $("#gst_" + element_id).prop('disabled', false);
//            $("#quantity_" + element_id).prop('disabled', false);
//            $("#discount_" + element_id).prop('disabled', false);
//            $("#final_rate_" + element_id).prop('disabled', false);
//            $("#product_div_" + element_id).remove();
//            $("#sub-product_div_" + element_id).remove();
//            $("#gst_price_" + element_id).val(0);
//            $("#discount_price_" + element_id).val(0);
//            updatePaidAndDue();
//            $(`<div class="col-md-4" id="general_product_description_div_1">
//                                <label style="color: gray">Product Description</label>
//                                <input type="text" name="Description[]" id="general_product_description_1" class="form-control">
//                            </div>`).insertAfter($("#general_div_" + element_id));
        } else {
            $("#product_div_" + element_id).show();
                $("#sub-product_div_" + element_id).show();
                $("#general_product_description_div_" + element_id).hide();
//            $("#gst_" + element_id).prop('disabled', true);
//            $("#quantity_" + element_id).prop('disabled', true);
//            $("#discount_" + element_id).prop('disabled', true);
//            $("#final_rate_" + element_id).prop('disabled', true);
//            $("#general_product_description_div_1").remove();
//            $(`<div class="col-md-2" id="product_div_${element_id}">
//                                <label>Product</label>
//                                <select id="product_${element_id}" class="form-control category_select">
//                                    <option disabled selected>Select Product</option>
//                                </select>
//                            </div>
//                            <div class="col-md-2" id="sub-product_div_${element_id}">
//                                <label>Sub-Product</label>
//                                <select id="sub-product_${element_id}" class="form-control sub-product_select">
//                                    <option disabled selected>Select Sub-Product</option>
//                                </select>
//                            </div>`).insertAfter($("#general_div_" + element_id));
        }
    });
    $("#products_container").on('change', '.product_select', function () {
        // console.log('fjfff');
        var element_id = $(this).attr("id").split('_')[1];
        var id = $(this).children(":selected").attr("id");
//        alert(id);
        getAndSetSubProducts(id, element_id);
    });
    $("#products_container").on('change', '.sub-product_select', function () {
        // console.log('dfdf');
        var element_id = $(this).attr("id").split('_')[1];
        var id = $(this).children(":selected").attr("id");
        getAndSetSubPriceAndGST(id, element_id);
        $("#quantity_" + element_id).prop("disabled", false);
        $("#discount_" + element_id).prop("disabled", false);
        var oldFinalValue = $("#final_rate_" + element_id).val();
        var oldFinalValueproduct = $("#final_rate_product_" + element_id).val();
        calculateFinalRate(element_id);
        updateFinal("finalTotal", $("#final_rate_" + element_id).val() - oldFinalValue);
        updateFinal("finalTotalTotal", $("#final_rate_product_" + element_id).val() - oldFinalValueproduct);
        update_final_bill_discount();
        updatePayments();
    });
    function twodigitdecimal(curr, str)
    {
        if(str.indexOf('.') != -1)
                  {
                    if(str.split('.')[1].length >= 2)
                    {
                        // console.log('curr',curr.value)
                        if(str.split('.')[1].length == 2)
                        {
                            curr.value = Number(curr.value).toFixed(2);
                        }else
                        {
                            curr.value =  Number(str.slice(0, -1));
                            // console.log('cufjfjmffjj',curr.value);
                        }
                    }
                  }
    }
    $("#products_container").on('input', '.quantity_input, .discount_input, .discount_price_input, .price_input, .gst_input', function () {
        clickonfinal = 0;
        if (this.value == "") {
            return ;
        }
        if (this.value) {
            var strnum2 = (this.value).toString();
            var strnum = Number((this.value).toString()).toString();
            if(strnum === strnum2)
              {
                  twodigitdecimal(this,strnum);
              }
            else
               {
                   if(strnum2[0] == '0')
                   {
                       this.value = Number(strnum2.slice(1));
                   }
               }
        }
        // console.log("ss")
        var element_id = $(this).attr("id").split('_')[1];
        var oldFinalValue = $("#final_rate_" + element_id).val();
        var oldFinalValueproduct = $("#final_rate_product_" + element_id).val();
        var oldDiscountValue = $("#discount_" + element_id).val();
        calculateFinalRate(element_id);
        updateFinal("finalTotal", $("#final_rate_" + element_id).val() - oldFinalValue);
        updateFinal("finalTotalTotal", $("#final_rate_product_" + element_id).val() - oldFinalValueproduct);
        update_final_bill_discount();
        updatePayments();
    });
    $("#products_container").on('input', '.final_input', function () {
        if (this.value == "") {
            return ;
        }
        if (this.value) {
            var strnum2 = (this.value).toString();
            var strnum = Number((this.value).toString()).toString();
            if(strnum === strnum2)
              {
                  twodigitdecimal(this,strnum);
              }
            else
               {
                   if(strnum2[0] == '0')
                   {
                       this.value = Number(strnum2.slice(1));
                   }
               }
        }

        clickonfinal = 1;
        // console.log('dd',this.value);
        
        // console.log('2');
        
        var element_id = $(this).attr("id").split('_')[2];

        var quantity = $("#quantity_" + element_id).val();
        if(quantity == 0 || quantity == '')
        {
            return;
        }

        var oldFinalValue = $("#final_rate_sub_" + element_id).val();
        var oldFinalValueproduct = $("#final_rate_product_" + element_id).val();
//        var discount = $("#discount_price_" + element_id).val();
        var gst = $("#gst_" + element_id).val();
//        var gst_price = (this.value * gst) / (100 + gst);
        var priceToBeDeducted = ((this.value * gst) / (100 + parseFloat(gst)));
        
        $("#price_" + element_id).val(((this.value - priceToBeDeducted) / quantity).toFixed(2));
        // console.log(((this.value - priceToBeDeducted) / quantity).toFixed(2));
        calculateFinalRate(element_id);
        updateFinal("finalTotal", $("#final_rate_" + element_id).val() - oldFinalValue);
        // console.log($("#final_rate_" + element_id).val());
        updateFinal("finalTotalTotal", $("#final_rate_product_" + element_id).val() - oldFinalValueproduct);
//        update_final_subtotal();
        update_final_bill_discount();
        updatePayments();
    });
    $("#cash_paid_checkbox").add("#card_paid_checkbox").add("#other_paid_checkbox").on('change', function () {
        var element = $(this).attr("id").split('_')[0] + "_" + $(this).attr("id").split('_')[1];
        if (this.checked) {
            $("#" + element).prop("disabled", false);
            if (this.id == "cash_paid_checkbox") {
                if ($("#card_paid_checkbox").prop('checked') == false && $("#other_paid_checkbox").prop('checked') == false) {
                    $("#cash_paid_checkbox").prop('checked', true);
                    $("#cash_paid").prop('disabled', false);
                    $("#cash_paid").val($("#finalTotal_amt").val());
                }
            }
            if (this.id == "card_paid_checkbox") {
                if ($("#cash_paid_checkbox").prop('checked') == false && $("#other_paid_checkbox").prop('checked') == false) {
                    $("#card_paid_checkbox").prop('checked', true);
                    $("#card_paid").prop('disabled', false);
                    $("#card_paid").val($("#finalTotal_amt").val());
                }
            }
            if (this.id == "other_paid_checkbox") {
                if ($("#cash_paid_checkbox").prop('checked') == false && $("#card_paid_checkbox").prop('checked') == false) {
                    $("#other_paid_checkbox").prop('checked', true);
                    $("#other_paid").prop('disabled', false);
                    $("#other_paid").val($("#finalTotal_amt").val());
                }
            }
            updatePaidAndDue();
        } else {
            $("#" + element).prop("disabled", true);
            $("#" + element).val("0");
            updatePaidAndDue();
        }
    });
    $("#cash_paid").add("#card_paid").add("#other_paid").on('input', function () {
        updatePaidAndDue();
        if (this.value != "") {
            this.value = parseFloat(this.value);
            $("#amount_paid").val(Math.round((parseFloat($("#cash_paid").val()) + parseFloat($("#card_paid").val()) + parseFloat($("#other_paid").val()) + parseFloat($("#discount").val())) * 20) / 20);
        }
    });
    $("#igst").on('input', function () {
        if (this.value != "") {
            this.value = (this.value.replace(/^0+/, ''));
            if (this.value != "") {
                let oldTotalGst = $("#totalGst").val();
                $("#totalGst").val(Math.round((parseFloat($("#cgst").val()) + parseFloat($("#sgst").val()) + parseFloat($("#igst").val())) * 20) / 20);
                // updateFinal("finalTotal", ($("#totalGst").val() - oldTotalGst));
                // updateFinal('sgst', (($("#gst_price_"+element_id).val()-oldGST)));
                updateFinal("finalTotal", ($("#totalGst").val() - oldTotalGst));
                updatePayments();
            }
        } else {
            let oldTotalGst = $("#totalGst").val();
            $("#totalGst").val(Math.round((parseFloat($("#cgst").val()) + parseFloat($("#sgst").val())) * 20) / 20);
            updateFinal("finalTotal", ($("#totalGst").val() - oldTotalGst));
            updatePayments();
        }
    });
    $("#customer_number").on('input', function () {
        if (this.value.length == 10) {
            this.disabled = true;
            $.ajax({
                url: "https://riseretail.net/web/routing.php",
                method: 'POST',
                data: {
                    getCustomerDetails: this.value
                },
                dataType: 'json',
                success: function (customerDetails) {
                    $("#customer_id").val(customerDetails[0].Customer_Id);
                    check_coupon();
                    VerifyCustomerMobileNumber();
                    if (customerDetails.length) {
                        $("#customer_name").val(customerDetails[0].Customer_Name);
                        $("#customer_name").prop('disabled', false);
                        $("#customer_address").val(customerDetails[0].Customer_Address);
                        $("#customer_address").prop('disabled', false);
                        $("#hashtag").val(customerDetails[0].Hashtag);
                        // $("#kyc-div").insertAfter("#customer_number-div");
                    } else {
                        $("#customer_name").prop('disabled', false);
                        $("#customer_address").prop('disabled', false);
                        $("#referral-div").insertAfter("#customer_number-div");
                    }
                }
            });
        }
    });

    $("#bill_discount").on('input', function () {
//        alert(this.value);
//        $("#totalDiscount").val(Math.abs(($("#loyalty-discount").val() + $("#bill_discount").val()) * 20) / 20);
            if(this.value == '')
            return;
        $("#totalDiscount").val(Math.round((parseFloat($("#loyalty-discount").val()) + parseFloat($("#bill_discount").val()) + parseFloat($("#discount").val())) * 20) / 20);
        update_final_bill_discount();
        updatePayments();
    });

});
function getAndSetProducts(id) {
    $.ajax({
        url: "https://riseretail.net/web/routing.php",
        method: 'POST',
        data: {
            getProducts: 'true'
        },
        dataType: 'json',
        success: function (products) {
            products.forEach(function (product) {
                $("#product_" + id).append(
                        `<option id='${product.Staff_Service_Id}' value='${product.Service_Name}'>${product.Service_Name}</option>`
                        );
            });
        }
    });
}
function getAndSetSubProducts(product_id, element_id) {
//    alert(product_id);
//    alert(element_id);
    $.ajax({
        url: "https://riseretail.net/web/routing.php",
        method: 'POST',
        data: {
            getSubProducts: product_id
        },
        dataType: 'json',
        success: function (subProducts) {
            clearAll(element_id);
            $("#sub-product_" + element_id).empty();
            $("#sub-product_" + element_id).append(`<option disabled selected>Select Sub-Product</option>`);
            subProducts.forEach(function (subProduct) {
                $("#sub-product_" + element_id).append(
                        `<option id='${subProduct.Staff_Sub_Service_Id}' value='${subProduct.Sub_Service_Name}'>${subProduct.Sub_Service_Name}</option>`
                        );
            });
        }
    });
}
function getAndSetStaffs(id) {
    $.ajax({
        url: "https://riseretail.net/web/routing.php",
        method: 'POST',
        data: {
            getStaffs: 'true'
        },
        dataType: 'json',
        success: function (staffs) {
            staffs.forEach(function (staff) {
                $("#staff_" + id).append(
                        `<option id='${staff.Staff_Id}' value='${staff.Staff_Name}'>${staff.Staff_Name}</option>`
                        );
            });
        }
    });
}
function getAndSetSubPriceAndGST(sub_product_id, element_id) {
    $.ajax({
        url: "https://riseretail.net/web/routing.php",
        method: 'POST',
        async: false,
        data: {
            getSubProductPriceAndGST: sub_product_id
        },
        dataType: 'json',
        success: function (priceAndGST) {
            clearAll(element_id);
            $("#price_" + element_id).val(priceAndGST[0].Service_Comission);
            $("#gst_" + element_id).val(priceAndGST[0].GST);
        }
    });
}
function clearAll(element_id) {
    $("#quantity_" + element_id).val(1);
    $("#discount_" + element_id).val(0);
    updateFinal("finalTotal", "-" + $("#final_rate_" + element_id).val());
    updateFinal("finalTotalTotal", "-" + $("#final_rate_product_" + element_id).val());
    updateFinal("discount", "-" + $("#discount_price_" + element_id).val());
    updateFinal("totalDiscount", "-" + $("#discount_price_" + element_id).val());
    updateFinal("totalGst", "-" + $("#gst_price_" + element_id).val() * 2);
    updateFinal("cgst", "-" + ($("#gst_price_" + element_id).val()));
    updateFinal("sgst", "-" + ($("#gst_price_" + element_id).val()));
    $("#final_rate_" + element_id).val(0);
    $("#final_rate_product_" + element_id).val(0);
    $("#final_rate_sub_" + element_id).val(0);
    $("#gst_" + element_id).val(0);
    $("#price_" + element_id).val("");
    updatePayments();
}
function calculateFinalRate(element_id) {
    // console.log('cal');
    var selling_price = $("#price_" + element_id).val();
    var quantity = $("#quantity_" + element_id).val();
    var oldDiscount = $("#discount_price_" + element_id).val();
    var oldGST = $("#gst_price_" + element_id).val();
    // console.log(selling_price,quantity,oldDiscount,oldGST);
    if ((selling_price != "")) {
        // console.log('selling');
        var final_rate = selling_price * quantity;
        // final_rate = final_rate.toFixed(2);
        // console.log('final rate--',final_rate);
   
        $("#final_rate_product_" + element_id).val(final_rate);        
        
        var discount = $("#discount_" + element_id).val();
        var discount_rs = $("#discountrupees_" + element_id).val();
        var gst = $("#gst_" + element_id).val();
        if (discount != 0 || discount_rs != 0) {
            discount = (final_rate * discount / 100) - (-discount_rs);
            final_rate = final_rate - discount;
            // console.log('brff'.final_rate);
        }
        
        if (gst != 0) {
            gst = (final_rate * gst / 100);
            final_rate = final_rate + gst;
            // console.log('finalrategst',final_rate,'gst',gst);
        }
        final_rate = parseFloat(final_rate).toFixed(2);
        // console.log(final_rate);
        if(!clickonfinal)
        {
            $("#final_rate_" + element_id).val(final_rate);
            // console.log('clickoninal---',final_rate);
        }else
            clickonfinal = 0;

        $("#final_rate_sub_" + element_id).val(final_rate);
        $("#discount_price_" + element_id).val(discount);
        $("#gst_price_" + element_id).val(gst / 2);
        updateFinal("discount", ($("#discount_price_" + element_id).val() - oldDiscount));
        updateFinal('cgst', (($("#gst_price_" + element_id).val() - oldGST)));
        updateFinal('sgst', (($("#gst_price_" + element_id).val() - oldGST)));
        $("#totalDiscount").val(Math.round((parseFloat($("#loyalty-discount").val()) + parseFloat($("#bill_discount").val()) + parseFloat($("#discount").val())) * 20) / 20);
        $("#totalGst").val((Math.round((parseFloat($("#cgst").val()) + parseFloat($("#sgst").val()) + parseFloat($("#igst").val())) * 20) / 20).toFixed(2));
        update_final_bill_discount();
        updatePayments();

    }
}
function updateFinal(id, value) {
    $("#" + id).val((Math.round((parseFloat($("#" + id).val()) + parseFloat(value)) * 20) / 20).toFixed(2));
    // console.log(id,value,'==',(Math.round((parseFloat($("#" + id).val()) + parseFloat(value)) * 20) / 20).toFixed(2));
}
function updatePayments() {
    if ($("#finalTotal_amt").val() != 0) {
        $("#cash_paid_checkbox").prop('checked', true);
        $("#cash_paid").prop('disabled', false);
        $("#cash_paid").val($("#finalTotal_amt").val());
        updatePaidAndDue();
    } else {
        let oldCashPaid = $("#cash_paid").val();
        $("#cash_paid_checkbox").prop('checked', false);
        $("#cash_paid").prop('disabled', true);
        $("#cash_paid").val($("#finalTotal_amt").val());
        updateFinal('amount_paid', ($("#cash_paid").val() - oldCashPaid))

    }
}
function updatePaidAndDue() {
    $("#amount_paid").val(Math.round((parseFloat($("#cash_paid").val()) + parseFloat($("#card_paid").val()) + parseFloat($("#other_paid").val())) * 20) / 20);
    $("#balance_due").val(Math.round(($("#amount_paid").val() - $("#finalTotal_amt").val()) * 20) / 20);
}

function update_final_bill_discount() {
//    alert(1);

    $("#finalTotal_amt").val(Math.round(($("#finalTotal").val() - $("#totalDiscount").val() - (-$("#discount").val())) * 20) / 20);
}

function update_final_subtotal() {
    $("#finalTotal").val(Math.round(($("#finalTotalTotal").val() - (-$("#totalGst").val())) * 20) / 20);
}

function check_coupon() {
    var mobile = document.getElementById('customer_number').value.trim();
    var Retailer_Id = document.getElementById('Retailer_Id').value.trim();
    var Customer_Id = document.getElementById('customer_id').value.trim();
    var btnclick = 1;
    var Verification_For_Coupon = 1;
    var postTo = '../lmsrr/android_webservices/check-outstanding-coupons.php';

    var data = {
        Customer_Phone_Number: mobile,
        Retailer_Id: Retailer_Id,
        Customer_Id: Customer_Id,
        btnclick: btnclick,
        Verification_For_Coupon: Verification_For_Coupon
    };
    jQuery.post(postTo, data,
            function (data) {
                // console.log(data);
                // console.log(data.success);

                if (data.success == '-4') {
                    $('input[name="loyalty-discount"]').val(data.Reward_Amount);
                    $('#without_discount').show();
                } else {
                    $('input[name="loyalty-discount"]').val(data.Reward_Amount);
//                    document.getElementById("Coupon_Master_Id").innerHTML = data.Coupon_Master_Id;
//                    document.getElementById("Reward_Amt").innerHTML = data.Reward_Amount;
                    $("#Coupon_Master_Id").val(data.Coupon_Master_Id);
                    $("#Reward_Amt").val(data.Reward_Amount);
                    $('#with_discount').show();
                }
                return false;
            }, 'json');
}

function editcustomer() {
//alert(1);
    var mobile = document.getElementById('customer_number').value.trim();
    var Retailer_Id = document.getElementById('Retailer_Id').value.trim();
//    alert(11);
    var Customer_Id = 1;
    var Customer_Note = "";
    var Txn_Ref_No = "";
    var Payment = 0;
    var Verification_For_Coupon = 1;
    var Note = document.getElementById('remarks').value.trim();
    var Hashtag = document.getElementById('hashtag').value.trim();
    var Customer_Name = document.getElementById('customer_name').value.trim();
    var Customer_Date_Of_Birth = document.getElementById('Customer_Date_Of_Birth').value.trim();
    var Customer_Anniversary = document.getElementById('Customer_Anniversary').value.trim();
    var Customer_Email_Id = '';
    var Tx_Amount = document.getElementById('finalTotalTotal').value.trim();
    var Net_Amt = document.getElementById('finalTotal_amt').value.trim();
    var Cash_Paid = document.getElementById('cash_paid').value.trim();
    var Card_Paid = document.getElementById('card_paid').value.trim();
    var Other_Paid = document.getElementById('other_paid').value.trim();
    var Disc_Per = document.getElementById('discount').value.trim();
    var Disc_Rs = document.getElementById('bill_discount').value.trim();
    var Disc_Loyalty = document.getElementById('loyalty-discount').value.trim();
    var Disc_Total = document.getElementById('totalDiscount').value.trim();
    var Referal_Number = document.getElementById('Referal_Number').value.trim();
    var Referal_Name = document.getElementById('Referal_Name').value.trim();
    var Referal_Extra_Note = document.getElementById('Referal_Extra_Note').value.trim();
    var Referal_Remarks = document.getElementById('Referal_Remarks').value.trim();
    var Totaltax = document.getElementById('totalGst').value.trim();
    var Customer_Gender = '';
    var Remainder_Date = document.getElementById('next_reminder_date').value.trim();
    var Remainder_Days = document.getElementById('next_reminder_days').value.trim();
    var txn_date = document.getElementById('invoice_date').value.trim();
    var Indicator = 1;
//    var numbers = /^\d{10}$/;

    var Service_Name = [];
    $("select[name='Item[]']").each(function () {
        var val = $(this).children(":selected").attr("id");
        if (val !== '')
            Service_Name.push(val);
    });
    var Service_Name = JSON.stringify(Service_Name);
//    alert(Service_Name);

    var Provider_Name = [];
    $("select[name='Service_Person[]']").each(function () {
        var val = $(this).children(":selected").attr("id");
        if (val !== '')
            Provider_Name.push(val);
    });
    var Provider_Name = JSON.stringify(Provider_Name);
//    alert(Provider_Name);

    var Service_Count = [];
    $("input[name='quantity[]']").each(function () {
        var val = $(this).val();
        if (val !== '')
            Service_Count.push(val);
    });
    var Service_Count = JSON.stringify(Service_Count);

    var Item_Price = [];
    $("input[name='price[]']").each(function () {
        var val = $(this).val();
        if (val !== '')
            Item_Price.push(val);
    });
    var Item_Price = JSON.stringify(Item_Price);
//    alert(Item_Price);

    var Provider_Designation = 0;
    var Rating = 0;

    var final_rate = [];
    $("input[name='final_rate[]']").each(function () {
        var val = $(this).val();
        if (val !== '')
            final_rate.push(val);
    });
    var final_rate = JSON.stringify(final_rate);
        if (document.getElementById('sms_option').checked) {
var message_indicator = 0;
        } else {
var message_indicator = 1;
        }

//                Provider_Name.push(parseInt($(this).children(":selected").attr("id")));
//                var Provider_Name = JSON.stringify(Provider_Name);

    var Is_Credit_Amount = 0;
    if (document.getElementById('bypass_loyalty').checked) {
        var url = '../../lmsrr/android_webservices/dont-check-outstanding-coupons.php';
    } else {
        var url = '../../lmsrr/android_webservices/check-outstanding-coupons.php';
    }
    var testing = false;
//                $('#white_trans').show();
//    $('#loaderd').show();
//    $('#gif').css('visibility', 'visible');
//alert(1);
    $.ajax({
        type: "POST",
        url: url,
        data: {Net_Amt:Net_Amt,Totaltax:Totaltax,message_indicator:message_indicator, Hashtag:Hashtag,txn_date: txn_date, Remainder_Date: Remainder_Date, Remainder_Days: Remainder_Days, Indicator: Indicator, Disc_Per: Disc_Per, Disc_Rs: Disc_Rs, Disc_Loyalty: Disc_Loyalty, Disc_Total: Disc_Total, Referal_Number: Referal_Number,Referal_Name: Referal_Name, Referal_Extra_Note: Referal_Extra_Note, Referal_Remarks: Referal_Remarks, Customer_Gender: Customer_Gender, Cash_Paid: Cash_Paid, Card_Paid: Card_Paid, Other_Paid: Other_Paid, Customer_Name: Customer_Name, Customer_Date_Of_Birth: Customer_Date_Of_Birth, Customer_Anniversary: Customer_Anniversary, Customer_Email_Id: Customer_Email_Id, Item_Price: Item_Price, Service_Count: Service_Count, Service_Name: Service_Name, Provider_Name: Provider_Name, Provider_Designation: Provider_Designation, Rating: Rating, Hashtag: Hashtag, Payment: Payment, Verification_For_Coupon: Verification_For_Coupon, Customer_Note: Customer_Note, Is_Credit_Amount: Is_Credit_Amount, Tx_Amount: Tx_Amount, Note: Note, Txn_Ref_No: Txn_Ref_No, Customer_Id: Customer_Id, Retailer_Id: Retailer_Id, Customer_Phone_Number: mobile,requestingfrominvoice:'1'},
        dataType: 'json',
        async: false,
        success: function (data) {
            // console.log(data);
            // console.log(data.success);

            if (data.Reward_Amount == -999 || data.success == 7 || data.success == 3 || data.success == 4 || data.success == 6) {
//                document.getElementById("Customer_Transaction_Id").innerHTML = data.Customer_Transaction_Id;
                var Customer_Transaction_Id = data.Customer_Transaction_Id;
                add_to_invoice(Customer_Transaction_Id);
                testing = true;
            }
//            else {

//                document.getElementById("Coupon_Master_Id").innerHTML = data.Coupon_Master_Id;
//                document.getElementById("Reward_Amt").innerHTML = data.Reward_Amount;
//                document.getElementById("Net_Amt").innerHTML = Tx_Amount - data.Reward_Amount;
//                document.getElementById("Customer_Id").innerHTML = data.Customer_Id;
//                document.getElementById("loyalty_discount").innerHTML = data.Reward_Amount;
//                document.getElementById("loyalty_discount").focus();
//                if (document.getElementById('subtotal').value.trim() - data.Reward_Amount > 0) {
//                $('#with_discount').show();
//                $('#without_discount').hide();
//                                $('#white_trans').show();
//                    $('#loaderd').hide();
//                    $('#gif').css('visibility', 'hidden');
//                } else {
//                    alert("Net Value Cannot be zero.")
//                }

//            }
        }
    });
//alert()
    return testing;

}

function redeem_coupon() {

    var mobile = document.getElementById('customer_number').value.trim();
    var Retailer_Id = document.getElementById('Retailer_Id').value.trim();
//    alert(11);
    var Customer_Id = document.getElementById('customer_id').value.trim();
    var Customer_Note = "";
    var Txn_Ref_No = "";
    var Payment = 0;
    var Verification_For_Coupon = 1;
    var Note = document.getElementById('remarks').value.trim();
    var Hashtag = document.getElementById('hashtag').value.trim();
    var Customer_Name = document.getElementById('customer_name').value.trim();
    var Customer_Date_Of_Birth = document.getElementById('Customer_Date_Of_Birth').value.trim();
    var Customer_Anniversary = document.getElementById('Customer_Anniversary').value.trim();
    var Tx_Amount = document.getElementById('finalTotalTotal').value.trim();
    var Coupon_Master_Id = document.getElementById('Coupon_Master_Id').value.trim();
    var Reward_Amt = document.getElementById('Reward_Amt').value.trim();
    var Net_Amt = document.getElementById('finalTotal_amt').value.trim();
    var Cash_Paid = document.getElementById('cash_paid').value.trim();
    var Card_Paid = document.getElementById('card_paid').value.trim();
    var Other_Paid = document.getElementById('other_paid').value.trim();
    var Disc_Per = document.getElementById('discount').value.trim();
    var Disc_Rs = document.getElementById('bill_discount').value.trim();
    var Disc_Loyalty = document.getElementById('loyalty-discount').value.trim();
    var Disc_Total = document.getElementById('totalDiscount').value.trim();
    var Referal_Number = document.getElementById('Referal_Number').value.trim();
    var Referal_Name = document.getElementById('Referal_Name').value.trim();
    var Referal_Extra_Note = document.getElementById('Referal_Extra_Note').value.trim();
    var Referal_Remarks = document.getElementById('Referal_Remarks').value.trim();
    var Totaltax = document.getElementById('totalGst').value.trim();
//    var Customer_Gender = '';
    var Remainder_Date = document.getElementById('next_reminder_date').value.trim();
    var Remainder_Days = document.getElementById('next_reminder_days').value.trim();
    var txn_date = document.getElementById('invoice_date').value.trim();
    var Indicator = 1;

    var Service_Name = [];
    $("select[name='Item[]']").each(function () {
        var val = $(this).children(":selected").attr("id");
        if (val !== '')
            Service_Name.push(val);
    });
    var Service_Name = JSON.stringify(Service_Name);
//    alert(Service_Name);

    var Provider_Name = [];
    $("select[name='Service_Person[]']").each(function () {
        var val = $(this).children(":selected").attr("id");
        if (val !== '')
            Provider_Name.push(val);
    });
    var Provider_Name = JSON.stringify(Provider_Name);
//    alert(Provider_Name);

    var Service_Count = [];
    $("input[name='quantity[]']").each(function () {
        var val = $(this).val();
        if (val !== '')
            Service_Count.push(val);
    });
    var Service_Count = JSON.stringify(Service_Count);

    var Item_Price = [];
    $("input[name='price[]']").each(function () {
        var val = $(this).val();
        if (val !== '')
            Item_Price.push(val);
    });
    var Item_Price = JSON.stringify(Item_Price);
//    alert(Item_Price);

    var Provider_Designation = 0;
    var Rating = 0;
    
    var final_rate = [];
    $("input[name='final_rate[]']").each(function () {
        var val = $(this).val();
        if (val !== '')
            final_rate.push(val);
    });
    var final_rate = JSON.stringify(final_rate);
        if (document.getElementById('sms_option').checked) {
var message_indicator = 0;
        } else {
var message_indicator = 1;
        }

    var Is_Credit_Amount = 0;
    if (document.getElementById('bypass_loyalty').checked) {
        var url = '../../lmsrr/android_webservices/dont-check-outstanding-coupons.php';
    } else {
        var url = '../../lmsrr/android_webservices/redeem-coupon.php';
    }
    var testing = true;
//alert(Coupon_Master_Id);
//alert(Reward_Amt);
    $.ajax({
        type: "POST",
        url: url,
        data: {Totaltax:Totaltax,message_indicator:message_indicator, Hashtag:Hashtag,txn_date: txn_date, Remainder_Date: Remainder_Date, Remainder_Days: Remainder_Days, Indicator: Indicator, Disc_Per: Disc_Per, Disc_Rs: Disc_Rs, Disc_Loyalty: Disc_Loyalty, Disc_Total: Disc_Total, Referal_Number: Referal_Number,Referal_Name: Referal_Name, Referal_Extra_Note: Referal_Extra_Note, Referal_Remarks: Referal_Remarks, Cash_Paid: Cash_Paid, Card_Paid: Card_Paid, Other_Paid: Other_Paid, Customer_Name: Customer_Name, Customer_Date_Of_Birth: Customer_Date_Of_Birth, Customer_Anniversary: Customer_Anniversary, Item_Price: Item_Price, Service_Count: Service_Count, Service_Name: Service_Name, Provider_Name: Provider_Name, Provider_Designation: Provider_Designation, Rating: Rating, Net_Amt: Net_Amt, Reward_Amt: Reward_Amt, Coupon_Master_Id: Coupon_Master_Id, Hashtag: Hashtag, Payment: Payment, Verification_For_Coupon: Verification_For_Coupon, Customer_Note: Customer_Note, Is_Credit_Amount: Is_Credit_Amount, Tx_Amount: Tx_Amount, Note: Note, Txn_Ref_No: Txn_Ref_No, Customer_Id: Customer_Id, Retailer_Id: Retailer_Id, Customer_Phone_Number: mobile,requestingfrominvoice:'1'},
        dataType: 'json',
        async: false,
        success: function (data) {
            // console.log(data);
            // console.log(data.success);
            if (data) {
                var Customer_Transaction_Id = data.Customer_Transaction_Id;
                add_to_invoice(Customer_Transaction_Id);
                testing = true;
            }

        }
    });
//alert()
    return testing;

}

function add_to_invoice(Customer_Transaction_Id) {
//alert(1);
    var Mobile_Number = document.getElementById('customer_number').value.trim();
    var Retailer_Id = document.getElementById('Retailer_Id').value.trim();
//    alert(11);
    var Address = document.getElementById('customer_address').value.trim();
    var Subtotal = document.getElementById('finalTotal').value.trim();
    var CGST = document.getElementById('cgst').value.trim();
    var SGST = document.getElementById('sgst').value.trim();
    var IGST = document.getElementById('igst').value.trim();
    var Totaltax = document.getElementById('totalGst').value.trim();
    var Net_Total = document.getElementById('finalTotal_amt').value.trim();
    var Due = document.getElementById('balance_due').value.trim();
    var Customer_Transaction_Id = Customer_Transaction_Id;
    var customer_gst = document.getElementById('customer_gst_no').value.trim();
    var subtotaldisc = document.getElementById('discount').value.trim();
    var Invoice_Number = document.getElementById('invoice_id').value.trim();
//    var Customer_Id = 1;
//    var Customer_Note = "";
//    var Txn_Ref_No = "";
//    var Payment = 0;
//    var Verification_For_Coupon = 1;
    var Note = document.getElementById('remarks').value.trim();
//    var Hashtag = 0;
    var Customer_Name = document.getElementById('customer_name').value.trim();
//    var Customer_Date_Of_Birth = '';
//    var Customer_Anniversary = '';
//    var Customer_Email_Id = '';
    var Amount_Paid = document.getElementById('amount_paid').value.trim();
    var cash_paid = document.getElementById('cash_paid').value.trim();
    var card_paid = document.getElementById('card_paid').value.trim();
    var wallet_paid = document.getElementById('other_paid').value.trim();
    var Discount_Per = 0;
    var Discount_Rs = document.getElementById('bill_discount').value.trim();
    var Discount_Loyalty = document.getElementById('loyalty-discount').value.trim();
    var Total_Discount = document.getElementById('totalDiscount').value.trim();
//    var Customer_Gender = '';
//    var Remainder_Date = document.getElementById('next_reminder_date').value.trim();
//    var Remainder_Days = document.getElementById('next_reminder_days').value.trim();
    var txn_date = document.getElementById('invoice_date').value.trim();
//    var Indicator = 1;
//    var numbers = /^\d{10}$/;

    var Service_Description = [];
    $("input[name='Description[]']").each(function () {
        var val = $(this).val();
//        if (val !== '')
        Service_Description.push(val);
    });
    var Service_Description = JSON.stringify(Service_Description);

    var Service_Name = [];
    $("select[name='Item[]']").each(function () {
        var val = $(this).children(":selected").attr("value");
        if (val !== '')
            Service_Name.push(val);
    });
    var Service_Name = JSON.stringify(Service_Name);
//    alert(Service_Name);

    var Item2 = [];
    $("select[name='Item2[]']").each(function () {
        var val = $(this).children(":selected").attr("value");
        if (val !== '')
            Item2.push(val);
    });
    var Item2 = JSON.stringify(Item2);
//    alert(Item2);

    var Service_Count = [];
    $("input[name='quantity[]']").each(function () {
        var val = $(this).val();
        if (val !== '')
            Service_Count.push(val);
    });
    var Service_Count = JSON.stringify(Service_Count);

    var Item_GST = [];
    $("input[name='gst[]']").each(function () {
        var val = $(this).val();
        if (val !== '')
            Item_GST.push(val);
    });
    var Item_GST = JSON.stringify(Item_GST);

    var Item_Price = [];
    $("input[name='price[]']").each(function () {
        var val = $(this).val();
        if (val !== '')
            Item_Price.push(val);
    });
    var Item_Price = JSON.stringify(Item_Price);
//    alert(Item_Price);

    var final_rate = [];
    $("input[name='final_rate[]']").each(function () {
        var val = $(this).val();
        if (val !== '')
            final_rate.push(val);
    });
    var final_rate = JSON.stringify(final_rate);
    
//    var final_rate = JSON.stringify(final_rate);
        if (document.getElementById('sms_option').checked) {
var message_indicator = 0;
        } else {
var message_indicator = 1;
        }
//    alert(Service_Name);alert(Item2);alert(Service_Count);alert(Item_Price);alert(final_rate);

//    var Provider_Designation = 0;
//    var Rating = 0;
//
//
////                Provider_Name.push(parseInt($(this).children(":selected").attr("id")));
////                var Provider_Name = JSON.stringify(Provider_Name);
//
//    var Is_Credit_Amount = 0;
    var testing = false;
//                $('#white_trans').show();
//    $('#loaderd').show();
//    $('#gif').css('visibility', 'visible');
//alert(1);
    $.ajax({
        type: "POST",
        url: "../../web/webservice/add_invoice.php",
        data: {message_indicator:message_indicator, Service_Description:Service_Description,txn_date:txn_date,Service_Name: Service_Name, Item2: Item2, Service_Count: Service_Count, Item_Price: Item_Price,Item_GST:Item_GST, final_rate: final_rate, Invoice_Number: Invoice_Number, subtotaldisc: subtotaldisc, customer_gst: customer_gst, cash_paid: cash_paid, card_paid: card_paid, wallet_paid: wallet_paid, Note: Note, Discount_Loyalty: Discount_Loyalty, Customer_Transaction_Id: Customer_Transaction_Id, Due: Due, Amount_Paid: Amount_Paid, Net_Total: Net_Total, Total_Discount: Total_Discount, Discount_Per: Discount_Per, Discount_Rs: Discount_Rs, Totaltax: Totaltax, SGST: SGST, CGST: CGST, IGST: IGST, Subtotal: Subtotal, Address: Address, Customer_Name: Customer_Name, Retailer_Id: Retailer_Id, Mobile_Number: Mobile_Number},
        dataType: 'json',
        async: false,
        success: function (data) {
            // console.log(data);
            // console.log(data.success);

//            if (data.Reward_Amount == -999 || data.success == 7 || data.success == 3 || data.success == 4 || data.success == 6) {
//                document.getElementById("Customer_Transaction_Id").innerHTML = data.Customer_Transaction_Id;
            testing = true;
//            }
//            else {

//                document.getElementById("Coupon_Master_Id").innerHTML = data.Coupon_Master_Id;
//                document.getElementById("Reward_Amt").innerHTML = data.Reward_Amount;
//                document.getElementById("Net_Amt").innerHTML = Tx_Amount - data.Reward_Amount;
//                document.getElementById("Customer_Id").innerHTML = data.Customer_Id;
//                document.getElementById("loyalty_discount").innerHTML = data.Reward_Amount;
//                document.getElementById("loyalty_discount").focus();
//                if (document.getElementById('subtotal').value.trim() - data.Reward_Amount > 0) {
//                $('#with_discount').show();
//                $('#without_discount').hide();
//                                $('#white_trans').show();
//                    $('#loaderd').hide();
//                    $('#gif').css('visibility', 'hidden');
//                } else {
//                    alert("Net Value Cannot be zero.")
//                }

//            }
        }
    });
//alert()
    return testing;

}

function VerifyCustomerMobileNumber() {
var mobile = document.getElementById('customer_number').value.trim();
        var Retailer_Id = document.getElementById('Retailer_Id').value.trim();
//                $('#loaderd').show();
//                $('#gif').css('visibility', 'visible');
        if (1 == 1) {
var postTo = '../../web/webservice/verify_customer_mobile.php';
        var data = {
        Customer_Phone_Number: mobile,
                Retailer_Id: Retailer_Id
        };
        jQuery.post(postTo, data,
                function (data) {
//                                $('#loaderd').hide();
//                                $('#gif').css('visibility', 'hidden');
                //alert(data);
                if (data.success == 1)
                {

//                                    document.getElementById('hashtag').value = data.hashtag;
//                                    document.getElementById('cust_name').value = data.Customer_Name;
                document.getElementById('Customer_Date_Of_Birth').value = data.Customer_Date_Of_Birth;
                        document.getElementById('Customer_Anniversary').value = data.Customer_Anniversary;
                        document.getElementById('Customer_Email_Id').value = data.Customer_Email_Id;
                        document.getElementById('Customer_Gender').value = data.Customer_Gender;
                        if (data.last_visited_date) {
                document.getElementById("last_visited_date").innerHTML = data.last_visited_date;
                $('#referal').css("cursor", "not-allowed");
                document.getElementById("referal").disabled = true;
//                                        $('#referal').css("display", "none");
//                                        document.getElementById("myBtn").disabled = true;
                } else {
                document.getElementById("last_visited_date").innerHTML = 'NA';
                }
                document.getElementById("trans_amt").innerHTML = data.trans_amt;
                        if (data.trans_amt) {
                } else {
                document.getElementById("sym").innerHTML = '0';
                }
                if (data.visit_count) {
                document.getElementById("visit_count").innerHTML = data.visit_count;
                } else {
                document.getElementById("visit_count").innerHTML = '0';
                }
                if (data.first_trans_date) {
                document.getElementById("first_trans_date").innerHTML = data.first_trans_date;
                } else {
                document.getElementById("first_trans_date").innerHTML = 'NA';
                }

                }

                return false;
                }, 'json');
        }
}

function display_trans() {

var mobile = document.getElementById('customer_number').value.trim();
        var Retailer_Id = document.getElementById('Retailer_Id').value.trim();
        var Customer_Id = document.getElementById('customer_id').value.trim();
        var postTo = '../../web/webservice/get_all_transaction.php';
        var data = {
        Customer_Phone_Number: mobile,
                Retailer_Id: Retailer_Id,
                Customer_Id: Customer_Id
        };
        jQuery.post(postTo, data,
                function (data) {

                console.log(data);

                document.getElementById("trans-history").innerHTML = data;
                        $('.active').css("display", "none");
                        return false;
                });
        }

function display_optics() {

var mobile = document.getElementById('customer_number').value.trim();
        var Retailer_Id = document.getElementById('Retailer_Id').value.trim();
//        var Customer_Id = document.getElementById('Customer_Id').value.trim();

        var postTo = '../../web/webservice/get_all_optic.php';
        var data = {
        Customer_Phone_Number: mobile,
                Retailer_Id: Retailer_Id
        };
        jQuery.post(postTo, data,
                function (data) {

                console.log(data);
                if (data.success == 1)
                {
                if (data.cust_datas) {
                document.getElementById("cust_datas").innerHTML = data.cust_datas;
                } else {
                document.getElementById("cust_datas").innerHTML = '';
                }
                }
                return false;
                }, 'json');
        }

function showrow() {
                var className = $('#btn-showmoret').text();
                if (className == 'More Transactions') {
                    $('#btn-showmoret').html("Hide");
                } else {
                    $('#btn-showmoret').html("More Transactions");
                }
                $('.active').toggle();
            }

$(function () {
    $('input[name="bypass_loyalty"]').click(function () {
        if ($(this).is(':checked'))
        {
            var test_loy = 0;
            $('input[name="loyalty-discount"]').val(+test_loy);
            var evt = new Event('input');
            document.getElementById("bill_discount").dispatchEvent(evt)
//                                    $('input[name="disc_amt"]').val(+test_loy);
//                                    var amount = $('input[name="amt"]').val();
//            var discount = $('input[name="discount"]').val();
//            $('input[name="totalDiscount"]').val(+discount);
////                                    alert(amount);
//                                    document.getElementById("loyalty-discount").innerHTML = amount;
//                                    document.getElementById("finalnetamt").innerHTML = amount;
//                                    $('input[name="finalnetamt"]').val(+amount);

        }
    });
});

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    