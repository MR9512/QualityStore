const $btnSignIn= document.querySelector('.sign-in-btn'),
      $btnSignUp = document.querySelector('.sign-up-btn'),  
      $signUp = document.querySelector('.sign-up'),
      $signIn  = document.querySelector('.sign-in');

document.addEventListener('click', e => {
    if (e.target === $btnSignIn || e.target === $btnSignUp) {
        $signIn.classList.toggle('active');
        $signUp.classList.toggle('active')
    }
});

$(".registrar").click(function(){
   event.preventDefault();
   var nombre = $(".nombre").val();
   var apellidos = $(".apellidos").val();
   var correo = $(".correo").val();
   var password = $(".password").val();
   var telefono = $(".telefono").val();
   var id_rol = $(".id_rol").val();

   $.ajax({
      url: "../login/save",
      data: {nombre:nombre, apellidos:apellidos, correo:correo, password:password, telefono:telefono, id_rol:id_rol},
      type: "POST",
      dataType: "json",
      success: function(res){
            
      },
      error: function(xhr, status){}
   })
});
