$('.ui.dropdown').dropdown();
$(".ui.accordion").accordion();
$('.ui.tabular.menu').tab();
$('.ui.checkbox').checkbox();
$('#toggle-sidebar').click(function() {
    $('#sidebar-mobile').sidebar({
        mobileTransition: 'overlay'
    }).sidebar('toggle')
});