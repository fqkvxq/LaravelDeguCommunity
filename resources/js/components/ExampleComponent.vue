<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white text-black shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="appname">
                    DeguCommunity
                </span>
            </a>
        </div>
    </nav>
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
