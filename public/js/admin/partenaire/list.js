var app2 = new Vue({
    el: '#result',
    data: {
        showed: {
            id: 0,
            nom: null,
            nom_respo: null,
            prenom_respo: null,
            numtel_respo: null,
            user: {email: null, photo: null, approuve: null},
            forme_juridique: {id:null,nom: null},
        },
    },
    methods: {
        getPartenaire: function (partenaire) {
            this.showed = partenaire;
        },
    },
    mounted: function () {
    }
});
var app = new Vue({
    el: '#tab-content-0',
    data: {
        showModal: false,
        partenaire: {
            id: 0,
            nom: null,
            nom_respo: null,
            prenom_respo: null,
            numtel_respo: null,
            user: {email: null, photo: null, approuve: null},
            forme_juridique_id:null,
            forme_juridique: {nom: null},

        },
        partenaires: [],
    },
    methods: {
        getPartenaire: function (partenaire) {
            app2.getPartenaire(partenaire);
        },
        findPartenaires: function () {
            axios.post(window.Laravel.url + '/admin/partenaires/', this.partenaire)
                .then(response => {
                    this.partenaires = response.data;
                    this.partenaires.forEach(function (a) {
                        a.user.photo = '/storage/partenaire/' + a.user.photo;
                    })
                })
                .catch(error => {
                    alert('failed');
                })
        },
        deletePartenaire: function (partenaire) {
            if (confirm("Voulez-vous vraiment supprimer l'element ?")) {
                axios.delete(window.Laravel.url + '/admin/partenaires/' + partenaire.id,
                    {headers: {_method: 'delete', "_token": window.Laravel.csrfToken}}
                )
                    .then(response => {
                        if (response.data.etat) {
                            var position = this.partenaires.indexOf(partenaire);
                            this.partenaires.splice(position, 1);
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