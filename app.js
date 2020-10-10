// mock data from mockaroo.com
const sampleData = [{
    key: "5361184396884292",
    title: "Switchable 3rd generation circuit",
    text: "Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.",
    done: false,
    date: "2019-11-03"
}];


new Vue({
    el: "#app",
    data: {
        todos: sampleData,
        editWindow: {
            title: "",
            text: "",
            done: false
        },
        searchString: ""
    },
    methods: {
        log: function (key) {
            this.todos.splice(key, 1);
        },
        onSubmit: function () {
            const {
                title,
                text,
                index
            } = this.editWindow;
            if (typeof index === "number") {
                this.todos[index] = {
                    ...this.todos.index,
                    title,
                    text
                };
            } else {
                const t = new Date();
                const d = t.getDate();
                const m = t.getMonth() + 1;
                const y = t.getFullYear();
                this.todos.push({
                    title,
                    text,
                    key: Date.now(),
                    done: false,
                    date: `${y}-${m}-${d}`
                });
            }
            $('#exampleModal').modal('hide');
        },
        onAddNew: function () {
            this.editWindow = {
                title: "",
                text: "",
                done: false
            };
        },
        onEdit: function (index) {
            const {
                title,
                text,
                key,
                done
            } = this.todos[index];
            this.editWindow = {
                title,
                text,
                key,
                index,
                done
            };
        },
        changeStatus: function (todo) {
            todo.done = !todo.done;
        }
    }
});