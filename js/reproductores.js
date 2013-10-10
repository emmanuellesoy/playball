var loaded = false;

var playPause = function () {
  if (!loaded) {
    this.on('canplay', function () {
      loaded = true;
      this.play();
    }, this);
    this.load('05_Kiss_Me.mp3');
  } else {
    this.playPause();
  }
}

var audio5js = new Audio5js({
  swf_path: 'swf/audio5js.swf',
  ready: function () {
    var btn = document.getElementById('play-pause');
    btn.addEventListener('click', playPause.bind(this), false);
  }
});