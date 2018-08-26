<script>
export default {
  name: 'sidebar',

  methods: {
    setActive(path) {
      return location.pathname.includes(path) ? 'active' : ''
    }
  }
}
</script>
