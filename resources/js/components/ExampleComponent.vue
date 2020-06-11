<template>
    <div>
        <b-navbar variant="faded" type="light">
            <b-navbar-brand tag="h1" class="mb-0">
                DeguCommunity
            </b-navbar-brand>
        </b-navbar>
    </div>
</template>

<script>
    export default {
        async mounted() {
            console.log('Component mounted.');
            const ret = await window.axios.get("/api/sample")
            console.log(ret.data)
            this.name = ret.data.name;
        },
        data() {
            return {
                name: window.data.name,
            };
        }
    }
</script>
