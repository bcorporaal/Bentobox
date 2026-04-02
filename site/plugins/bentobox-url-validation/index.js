panel.plugin('bentobox/url-validation', {
  created(app) {
    const urlHelper = app?.$helper?.url
    if (!urlHelper || typeof urlHelper.isUrl !== 'function') {
      return
    }

    urlHelper.isUrl = function (value, strict) {
      if (value instanceof URL || value instanceof Location) {
        value = value.toString()
      }
      if (typeof value !== 'string') {
        return false
      }

      let parsed
      try {
        parsed = new URL(value, window.location)
      } catch {
        return false
      }

      if (strict !== true) {
        return true
      }

      const scheme = parsed.protocol.replace(/:$/, '').toLowerCase()
      return ['http', 'https', 'ftp'].includes(scheme)
    }
  }
})
