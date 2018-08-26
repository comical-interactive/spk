<template></template>

<script>
export default {
    name: 'flash',

    props: {
        message: String,
        level: String
    },

    data() {
        return {
            head: '',
            type: this.level,
            body: this.message
        }
    },

    methods: {
        flash(data) {
            //  ['','info','success','warning','danger']

            if (data) {
                this.body = data.message
                this.head = `<b>${data.title}</b>`
                this.type = data.level
            }

            $.notify(
                {
                    icon: 'ti-bell',
                    message: this.body,
                    title: this.head
                },
                {
                    type: this.type,
                    timer: 4000,
                    placement: {
                        from: 'top',
                        align: 'right'
                    }
                }
            )
        }
    },

    created() {
        if (this.message) {
            this.flash()
        }

        window.events.$on('flash', data => this.flash(data))
    }
}
</script>
