var app2 = new Vue({
    el: '#result',
    data: {
        showed: {
            id: 0,
            nom: null,
            prenom: null,
            num_tel: null,
            departements: [],
            user: {email: null, photo: null, approuve: 0, photo: null},
            description: null
        },
    },
    methods: {
        getAdherent: function (adherent) {
            this.showed = adherent;
        },
    },
    mounted: function () {
    }
});
var app3 = new Vue({
    el: '#edit',
    data: {
        ed: {
            id: 0,
            departements: [],
        },
    },
    methods: {
        affecter: function (adherent) {
            this.ed.id = adherent;
        },
    },
    mounted: function () {
    }
});
var app = new Vue({
    el: '#tab-content-0',
    data: {
        showModal: false,
        adherent: {
            id: 0,
            nom: null,
            prenom: null,
            num_tel: null,
            departements: [],
            user: {email: null, photo: null, approuve: null, photo: null},
            description: null
        },
        adherents: [],
    },
    methods: {
        affecter: function (adherent) {
            app3.affecter(adherent.id);
        },
        getAdherent: function (adherent) {
            app2.getAdherent(adherent);
        },
        findAdherents: function () {
            axios.post(window.Laravel.url + '/admin/adherents/', this.adherent)
                .then(response => {
                    this.adherents = response.data;
                    this.adherents.forEach(function (a) {
                        a.user.photo = '/storage/adherent/' + a.user.photo;
                    })
                })
                .catch(error => {
                    alert('failed');
                })
        },
        deleteAdherent: function (adherent) {
            if (confirm("Voulez-vous vraiment supprimer l'element ?")) {
                axios.delete(window.Laravel.url + '/admin/adherents/' + adherent.id,
                    {headers: {_method: 'delete', "_token": window.Laravel.csrfToken}}
                )
                    .then(response => {
                        if (response.data.etat) {
                            var position = this.adherents.indexOf(adherent);
                            this.adherents.splice(position, 1);
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