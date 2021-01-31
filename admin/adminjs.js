$('.adminTitle').on('click',()=>{
    $.ajax({
        url: '../includes/logout.inc.php',
        success: function() {
            window.location.href = "../index.php";
        }
    });
    
});

function confirmOrder(order) {
    let orderId = $(order).attr('data-orderId');
    let prdId = $(order).attr('data-prdId');
    $.ajax({
        url: 'confirmOrder.ajax.php',
        type: 'POST',
        data: {
            prdId : prdId,
            orderId : orderId
        },
        success: function(result) {
            console.log(result);
            window.location.href = "adminOrder.php";
        }
    });
}