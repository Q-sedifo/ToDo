
class Message {
    constructor() {
        this.events()
    }

    events() {
        setTimeout(() => {
            $('.message').each(function() {
                $(this).fadeOut()
            })
        }, 2500)
    }
}

export default Message