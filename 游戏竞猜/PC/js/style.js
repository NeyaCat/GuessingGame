$(function() {
// 弹出遮罩层
    $(".btn02").click("touchstart", function () {
        $(".mask_box").fadeIn();
    });
    $(".qx>a").click("touchstart", function () {
        $(".mask_box").fadeOut();
    });
    $(".btn03").click("touchstart", function () {
        $(".box_1").fadeIn();
    });
});