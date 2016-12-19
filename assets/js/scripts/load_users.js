var loadUsers = (function($){
    var MY_CONSTANT = 123;

    var _myPrivateVariable = 'TEST MEH';
    var _$myPrivateJqueryObject = $('div.content');

    var _myPrivateMethod = function(){
        alert('I am private!');
    };

    var myPublicMethod = function(){
        console.log('Public much?');
    };

    return {
        myPublicMethod : myPublicMethod
    };

})(jQuery);

//loadUsers.myPublicMethod();