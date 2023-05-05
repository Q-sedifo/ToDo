
class PopUp {
    constructor() {
        this.popUp = $('.pop-up')
    }

    activate(time = 0) {
        this.popUp.fadeIn(time)
    }

    deactivate(time = 0) {
        this.popUp.fadeOut(time, function() {
            $(this).hide()
        })
    }
}

export default PopUp