
class Widget {
    constructor() {
        this.triggers = $('.widget[mobile-keyboard] textarea, input')
        this.widget = $('.widget')
        this.modal = this.widget.parents('.modal')
        this.events()
    }

    events() {
        this.triggers.first().on('focus', this.verifyRaiseWidget.bind(this))
        this.widget.on('click', this.dropWidget.bind(this))
        this.triggers.on('click', this.verifyRaiseWidget.bind(this))
        this.modal.on('click', this.dropWidget.bind(this))
    }

    raiseWidget(e) {
        const distance = $('.widget').position().top
       
        if (window.innerWidth < 500) {
            this.widget.css('transform', `translateY(-${distance / 1.4}px)`)
            this.activated = true
        } 
    }

    dropWidget(e) { 
        e.stopPropagation()
        if (window.innerWidth < 500) {
            this.widget[0].removeAttribute('style')
        } 
    }

    verifyRaiseWidget(e) {
        e.stopPropagation()
        if (!this.widget[0].hasAttribute('style')) {
            this.raiseWidget()
        }
    }
}

export default Widget