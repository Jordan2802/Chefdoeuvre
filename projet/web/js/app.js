
//faire apparaitre le form pour changer le mot de passe  au clic.

function formVisible() {
    if ($('.updateProfil').hasClass('cacher')) {
      $('.updateProfil').removeClass('cacher');
    
    } else {
      $('.updateProfil').addClass('cacher');
  
    }
  }
