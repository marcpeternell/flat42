<template>
    <form
        @submit.prevent="onSubmit"
        class="form-row"
        @keydown="form.errors.clear($event.target.name)"
        @change="form.errors.clear($event.target.name)"
    >
        <div class="form-group col-md-6">
            <input
                class="form-control"
                type="text"
                name="title"
                id="title"
                placeholder="Was willst du mitteilen?"
                v-model="form.title"
            />
            <div
                class="invalid-feedback"
                v-if="form.errors.has('title')"
                v-text="form.errors.get('title')"
            ></div>
        </div>
        <div class="col-md-6 form-group">
            <button
                class="btn btn-outline-dark w-100"
                type="submit"
                :disabled="form.errors.any()"
            >
                <i class="fas fa-plus"></i> Status posten
            </button>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        status
    },
    data() {
        return {
            form: new Form({
                title: ""
            })
        };
    },
    methods: {
        onSubmit() {
            this.form
                .post("api/home")
                .then(status => {
                    this.$emit("completed", status)
                })
                .catch(errors => {
                    this.flash(errors.title, "error", {
                        timeout: 3000
                    });
                });
        }
    }
};
</script>
