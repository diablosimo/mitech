var app2 = new Vue({
    el: '#result',
    data: {
        showed: {
            id: 0,
            nom: null
        },
    },
    methods: {
        getPhoto: function (photo) {
            this.showed = photo;
        },
    },
    mounted: function () {
    }
});
var app = new Vue({
    el: '#tab-content',
    data: {
        activite: {id:0},
        photo: {
            id: 0,
            nom: null
        },
        photos: [],
    },
    methods: {
        getPhoto: function (photo) {
            app2.getPhoto(photo);
        },
        findPhotos: function () {
            axios.post(window.Laravel.url + '/admin/activites/photos',this.activite)
                .then(response => {
                    this.photos = response.data;
                    this.photos.forEach(function (a) {
                        a.image = '/storage/activite/' + a.image;
                    })
                })
                .catch(error => {
                    alert('failed');
                })
        },
        deletePhoto: function (photo) {
            if (confirm("Voulez-vous vraiment supprimer l'element ?")) {
                axios.delete(window.Laravel.url + '/admin/activites/photos/' + photo.id,
                    {headers: {_method: 'delete', "_token": window.Laravel.csrfToken}}
                )
                    .then(response => {
                        if (response.data.etat) {
                            var position = this.photos.indexOf(photo);
                            this.photos.splice(position, 1);
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