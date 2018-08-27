<script>
export default {
    name: 'sidebar',

    methods: {
        setActive(path) {
            let testPaths = ['ists', 'rmibs', 'mbtis', 'eppss', 'lss']
            let patterns = new RegExp('(' + testPaths.join('|') + ')')
            console.log(location.pathname.match(patterns))

            if (path === 'schools') {
                return location.pathname.includes(path) &&
                    !location.pathname.match(patterns)
                    ? 'active'
                    : ''
            }

            return location.pathname.includes(path) ? 'active' : ''
        }
    }
}
</script>
