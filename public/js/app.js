Vue.prototype.$http = axios;
new Vue({
	el: '#app',

	data: {
		skills: []
	},

	mounted() {
		this.$http.get('news/skills').then(response => this.skills = response.data);
        
	}
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('.dropdown-menu .checkbox-dropdown-item').click(function(e) {
        e.stopPropagation();
    });
});
