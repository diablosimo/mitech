var app2 = new Vue({
    el: '#result',
    data: {
        showed: {
            id: 0,
            nom: null,
            prenom: null,
            email: null,
            numtel: null,
            objet: null,
            message: null
        },
    },
    methods: {
        getMessage: function (message) {
            this.showed = message;
        },
    },
    mounted: function () {
    }
});
var app = new Vue({
    el: '#tab-content-0',
    data: {
        request: {date_min:null, date_max:null},
        message: {
            id: 0,
            nom: null,
            prenom: null,
            email: null,
            numtel: null,
            objet: null,
            message: null
        },
        messages: [],
    },
    methods: {
        getMessage: function (activite) {
            app2.getMessage(activite);
        },
        findMessages: function () {
            axios.post(window.Laravel.url + '/admin/messages/',this.request)
                .then(response => {
                    this.messages = response.data;
                })
                .catch(error => {
                    alert('failed');
                })
        },
        deleteMessage: function (message) {
            if (confirm("Voulez-vous vraiment supprimer l'element ?")) {
                axios.delete(window.Laravel.url + '/admin/messages/' + message.id,
                    {headers: {_method: 'delete', "_token": window.Laravel.csrfToken}}
                )
                    .then(response => {
                        if (response.data.etat) {
                            var position = this.messages.indexOf(message);
                            this.messages.splice(position, 1);
                        }
                    })
                    .catch(error => {
                        alert('failed');
                    })
            }
        }
    },
    mounted: function () {
    }
});
