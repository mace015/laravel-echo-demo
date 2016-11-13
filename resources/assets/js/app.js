
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data: function() {
    	return {
	    	newTask: '',
	    	tasks: []
	    }
    },
    methods: {
    	listen: function() {
    		Echo.channel('tasks')
    			.listen('TaskCreated', (event) => {
    				this.addTaskToList(event.task);
    			})
                .listen('TaskDeleted', (event) => {
                    this.deleteTaskFromList(event.task);
                });
    	},
    	fetchTasks: function() {
    		this.$http.post('/tasks/index').then(function(res){
    			this.tasks = res.body;
    		});
    	},
    	addTask: function() {
            this.$http.post('/tasks/create', { task: this.newTask }).then(function(res){
                this.addTaskToList(res.body);
            });
    		this.newTask = '';
    	},
    	removeTask: function(id) {
            this.deleteTaskFromList(id);
    		this.$http.post('/tasks/delete', { id: id });
    	},
        addTaskToList: function(task){
            this.tasks.push(task);
        },
        deleteTaskFromList: function(id){
            this.tasks = this.tasks.filter(function(task) {
                return task.id != id;
            });
        }
    },
    created: function() {
        this.listen();
    	this.fetchTasks();
    }
});
