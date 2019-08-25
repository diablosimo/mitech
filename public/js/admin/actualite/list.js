var res = new Vue({
    el: '#result',
    data: {
        showed: {
            id: 0,
            titre: null,
            sous_titre: null,
            photo: null,
            admin: {nom: null, prenom: null},
            article: null,
        },
    },
    methods: {
        getActualite: function (id) {
            axios.get(window.Laravel.url + '/admin/actualites/' + id)
                .then(response => {
                    this.showed = response.data;
                    this.showed.photo='/storage/actualite/'+this.showed.photo;
                })
                .catch(error => {
                    alert('failed');
                })
        },
        mounted: function () {
        }
    }
});
var app = new Vue({
    el: '#tab-content-0',
    methods: {
        getActualite: function (id) {
            res.getActualite(id);
        },
        mounted: function () {
        }
    }
});