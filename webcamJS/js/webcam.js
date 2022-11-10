window.addEventListener("load",function(){
    const boton = this.document.getElementById("snap");
    const video = this.document.getElementById("video");
    const canvas = document.getElementById('canvas');

    const constraints = {
        audio: true,
        video: {
          width: 1280, height: 720
        }
      };
      
      // Access webcam
      async function init() {
        try {
          const stream = await navigator.mediaDevices.getUserMedia(constraints);
          handleSuccess(stream);
        } catch (e) {
         // errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
        }
      }
      
      // Success
      function handleSuccess(stream) {
        window.stream = stream;
        video.srcObject = stream;

      }
      // Load init
    init();

   
    boton.addEventListener("click", function() {
        var context = canvas.getContext('2d');
        var imagen=document.createElement("img");
        imagen.src="./img/coche.jpg";
            imagen.addEventListener("load",function(){
                context.drawImage(video, 0, 0, 640, 480);
            }
            )
       
});

})
