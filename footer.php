<div class="clearfix"></div>
         <footer class="site-footer">
            <div class="footer-inner bg-white">
               <div class="row">
                  <div class="col-sm-6 text-right">
                     Designed & Developed by Team Recursive Challengers
                  </div>
               </div>
            </div>
         </footer>
      </div>
      <script>
    const handleSpeech = () => {
        const speech = new SpeechSynthesisUtterance();
        const message = document.getElementById("prescription").textContent; 
        speech.lang = 'en-US'; 
        speech.text = message;
        window.speechSynthesis.speak(speech); 
    }
function handleClear() {
    document.getElementById("pres").textContent = '';
}

function handleSpeak() {
    var recognition = new webkitSpeechRecognition();
    recognition.lang = "en-GB";
    recognition.onresult = function(event) {
        document.getElementById("pres").textContent = event.results[0][0].transcript;
    };
    recognition.start();
}


</script>

      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>