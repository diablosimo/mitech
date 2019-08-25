var app2 = new Vue({
    el: '#result',
    data: {
        showed: {
            id: 0,
            fonction: null,
            adherent: {
                id: 0,
                nom: null,
                prenom: null,
                num_tel: null,
                user: {email: null, photo: null, approuve: null},
                description: null
            }
        },
    },
    methods: {
        getMembre: function (membre) {
            this.showed = membre;
        },
    },
    mounted: function () {
    }
});
var app = new Vue({
    el: '#tab-content-0',
    data: {
        membre: {
            id: 0,
            function: null,
            adherent: {
                id: 0,
                nom: null,
                prenom: null,
                num_tel: null,
                user: {email: null, photo: null, approuve: null},
                description: null
            }
        },
        nvmembre: {
            adherent_id: null,
            fonction: null
        },
        membres: [],
    },
    methods: {
        getMembre: function (membre) {
            app2.getMembre(membre);
        },
        addMembre: function () {
            axios.post(window.Laravel.url + '/admin/membrebureau/', this.nvmembre)
                .then(response => {
                    if (response.data.etat) {
                        response.data.added.adherent.user.photo = '/storage/adherent/' + response.data.added.adherent.user.photo;
                        this.membres.push(response.data.added);
                    }
                })
                .catch(error => {
                    alert('failed');
                })
        },
        deleteMembre: function (membre) {
            if (confirm("Voulez-vous vraiment supprimer l'element ?")) {
                axios.delete(window.Laravel.url + '/admin/membrebureau/' + membre.id,
                    {headers: {_method: 'delete', "_token": window.Laravel.csrfToken}}
                )
                    .then(response => {
                        if (response.data.etat) {
                            var position = this.membres.indexOf(membre);
                            this.membres.splice(position, 1);
                        }
                    })
                    .catch(error => {
                        alert('failed');
                    })
            }
        }

    },
    mounted: function () {
        axios.get(window.Laravel.url + '/admin/membrebureau/find')
            .then(response => {
                this.membres = response.data;
                this.membres.forEach(function (a) {
                    a.adherent.user.photo = '/storage/adherent/' + a.adherent.user.photo;
                })
            })
            .catch(error => {
               alert('failed');
            })
    },
});