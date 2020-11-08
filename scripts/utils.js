// MÉTODOS
function Sound(source, volume, loop) {
    this.source = source;
    this.volume = volume;
    this.loop = loop;
    var son;
    this.son = son;
    this.finish = false;

    this.start = function() {
        if (this.finish) return false;
        this.son = document.createElement("embed");
        this.son.setAttribute("src", this.source);
        this.son.setAttribute("volume", this.volume);
        this.son.setAttribute("loop", this.loop);
        this.son.setAttribute("hidden", "true");
        this.son.setAttribute("autostart", "true");
        document.body.appendChild(this.son);
    }

    this.init = function(volume, loop) {
        this.finish = false;
        this.volume = volume;
        this.loop = loop;
    }
}

// CONSTANTES
var maxAttemps = 5;