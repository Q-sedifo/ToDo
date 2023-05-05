
class Header {
    constructor() {
        this.header = document.querySelector('header')
        this.events()
    }

    events() {
        window.addEventListener('scroll', this.headerAnimation.bind(this))
    }

    headerAnimation() {
        if (pageYOffset > 0) {
            this.header.classList.add('active')
            return
        }
        
        this.header.classList.remove('active')
    }
}

export default Header