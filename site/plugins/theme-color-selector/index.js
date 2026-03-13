panel.plugin('bentobox/theme-color-selector', {
  fields: {
    'theme-color-display': {
      props: {
        hex: { type: String, default: null },
        label: { type: String, default: 'Selected color' },
        sourceField: { type: String, default: 'titlecolor' }
      },
      data () {
        return {
          colors: {},
          loading: true
        }
      },
      computed: {
        currentKey () {
          const name = this.sourceField
          if (this.$store && this.$store.state) {
            const state = this.$store.state
            const form = state.content || state.form || state.fields
            if (form && typeof form[name] !== 'undefined') return form[name]
          }
          let p = this.$parent
          while (p) {
            for (const key of ['content', 'form', 'data', 'model', 'values']) {
              if (p[key] && typeof p[key][name] !== 'undefined')
                return p[key][name]
            }
            if (p.$children && p.$children.length) {
              const sibling = p.$children.find(
                c =>
                  (c.$options.propsData &&
                    c.$options.propsData.name === name) ||
                  c.name === name
              )
              if (sibling && sibling.value !== undefined) return sibling.value
            }
            p = p.$parent
          }
          return null
        },
        displayHex () {
          if (this.loading) return this.hex || ''
          const key = this.currentKey
          if (key && this.colors[key]) return this.colors[key]
          return this.hex || ''
        }
      },
      mounted () {
        this.$api
          .get('theme-colors')
          .then(res => {
            if (res && !res.error) this.colors = res
            this.loading = false
          })
          .catch(() => {
            this.loading = false
          })
      },
      render (h) {
        const hex = this.displayHex
        const body = hex
          ? h(
              'div',
              {
                style:
                  'display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem;'
              },
              [
                h('span', {
                  style:
                    'width: 2.25rem; height: 2.25rem; border-radius: 4px; background: ' +
                    hex +
                    '; border: 1px solid rgba(0,0,0,0.12);'
                }),
                h(
                  'span',
                  { style: 'font-family: monospace; color: #666;' },
                  hex
                )
              ]
            )
          : h(
              'div',
              { style: 'font-size: 0.85rem; color: #999;' },
              this.loading ? 'Loading…' : 'No active theme or color.'
            )
        return h('k-field', { props: { label: this.label } }, [body])
      }
    }
  }
})
