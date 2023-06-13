<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/homepage.css')); ?>">
 <?php $__env->stopSection(); ?>
     
 <?php $__env->startSection('content'); ?>

 <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>


<div id="app"></div>

<div>
  <div id="app"></div>
  <div id="test-form"></div>

<div class="square-container">

  <div id="directAudio" class="square">
    <img src="<?php echo e(asset('img/directAudio.jpg')); ?>" alt="Image" class="square-image">
    <div class="gray-bar gris">
      <img src="<?php echo e(asset('img/iconeDirectAudio.png')); ?>"/>
      <p class="text FontMonserrat">Direct audio</p>
    </div>
  </div>

  <div id="directVideo" class="square">
    <img src="<?php echo e(asset('img/directVideo.jpg')); ?>" alt="Image" class="square-image">
    <div class="gray-bar gris"> 
      <img src="<?php echo e(asset('img/iconeDirectVideo.png')); ?>"/>
      <p class="text FontMonserrat">Direct vidéo</p>
    </div>
  </div>

</div>


<h1 class="FontInter">Actualité</h1>
<div class="actualiteContainer">

  <div class="articleContainer">
    <img id="article1" src="<?php echo e(asset('img/article1.jpg')); ?>" alt="Article 1">
    <h2 class="titreInfo">Nouvelle émission radio</h2>
    <p class="texteInfo">Le DJ et producteur DC Salas vous fait découvrir le meilleur de la scène belge sur Couleur 3. 
      En collaboration avec Jam, la nouvelle radio musicale de la RTBF, une heure de 
      voyage entre electro, hip hop et tout ce qu'il se passe de passionnant entre deux."</p>
  </div>

  <div class="articleContainer">
    <img id="article2" src="<?php echo e(asset('img/article2.jpg')); ?>" alt="Article 2">
    <h2 class="titreInfo">Les joueurs mettent les buts, Couleur 3 met l’ambiance!</h2>
    <p class="texteInfo">Footaises est de retour à l’occasion des matchs de la Suisse, des 
        demi-finales et de la finale de la Coupe du Monde! Fidèles au poste, Fantin Moreno, Blaise Bersinger et 
        Charles Nouveau vont nous faire vibrer.</p>
  </div>
</div>

  <div id="videos">
    <h1 class="FontInter">Vidéos</h1>
    <div class="videoContainer">
      <a href="https://www.youtube.com/watch?v=ftQmxlv3sUU&pp=ygUcY291bGV1ciAzIGJvbiBiZW4gdm9pbGEgbmV3cw%3D%3D">
      <img id="video1" src="<?php echo e(asset('img/video1.jpg')); ?>" alt="Vidéo 1"></a>
      <a href="https://www.youtube.com/watch?v=x8oiLuEG9sw&pp=ygUOY291bGV1cjMgZGlzaXo%3D">
      <img  id="video2" src="<?php echo e(asset('img/video2.jpg')); ?>" alt="Vidéo 2">
      </a>  
    </div>
  </div>




<div class="buttonContainer">
<button class="FontMontserrat rose"><a href="https://www.youtube.com/@Couleur3">Toutes les vidéos</a></button>
</div>
<script>
  //selectionner directAudio
  var directAudio = document.getElementById("directAudio");
  //Selectionner directVideo
  var directVideo = document.getElementById("directVideo");

  //Ajouter un event listener sur directAudio
  directAudio.addEventListener("click", function(){
    window.location.href = "https://www.youtube.com/watch?v=ftQmxlv3sUU&pp=ygUcY291bGV1ciAzIGJvbiBiZW4gdm9pbGEgbmV3cw%3D%3D";
  });

  //Ajouter un event listener sur directVideo
  directVideo.addEventListener("click", function(){
    window.location.href = "emission";
  });

</script>
<?php $__env->stopSection(); ?>





<?php echo $__env->make("template", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/projart/2023/50/flop/flop-laravel/resources/views/homePage.blade.php ENDPATH**/ ?>