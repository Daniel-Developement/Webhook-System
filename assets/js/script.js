const app = {
    data() {
        return {
            messages: [],
        }
    },

    methods: {
        sendMessage() {
            const author = document.querySelector('#author_content');
            const message = document.querySelector('#message_content');
            const avatar = document.querySelector('#avatar_content');

            if (author.value.length < 1 || message.value.length < 1 || avatar.value.length < 1) {
                toastr.error('Erro preencha os campos', 'Erro');
            } else if (!avatar.value.includes('https://'.toLowerCase())) {
                toastr.error('Avatar incorreto', 'Erro');
            } else {
                $.post('sendMessage.php?message=' + message.value + '&author=' + author.value + '&avatar=' + avatar.value).done((data) => {
                    console.log(data);
                    toastr.success('Mensagem enviada com sucesso', 'Sucesso');
                })
            }
        },
    },

}

Vue.createApp(app).mount('#app');

Array.prototype.sum = function () {
    return this.reduce((prev, cur) => prev + cur, 0);
}