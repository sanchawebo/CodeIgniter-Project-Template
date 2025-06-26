/*!
 * Simple theme toggler for Bootstrap's color mode
 * Uses a single button with id 'theme-switcher' to toggle between light and dark mode
 */

(() => {
  'use strict'

  const getStoredTheme = () => localStorage.getItem('theme')
  const setStoredTheme = theme => localStorage.setItem('theme', theme)

  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme === 'light' || storedTheme === 'dark') {
      return storedTheme
    }
    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }

  const setTheme = theme => {
    document.documentElement.setAttribute('data-bs-theme', theme)
  }

  // Initialize theme on page load
  setTheme(getPreferredTheme())

  // Update button label/icon based on current theme
  const updateButton = (theme) => {
    const btn = document.getElementById('theme-switcher')
    if (!btn) return
    btn.setAttribute('aria-label', `Switch to ${theme === 'dark' ? 'light' : 'dark'} mode`)
  }

  // Listen for system theme changes if theme is not explicitly set
  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    const storedTheme = getStoredTheme()
    if (storedTheme !== 'light' && storedTheme !== 'dark') {
      const newTheme = getPreferredTheme()
      setTheme(newTheme)
      updateButton(newTheme)
    }
  })

  window.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('theme-switcher')
    if (!btn) return

    let currentTheme = getPreferredTheme()
    updateButton(currentTheme)

    btn.addEventListener('click', () => {
      currentTheme = document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark'
      setStoredTheme(currentTheme)
      setTheme(currentTheme)
      updateButton(currentTheme)
    })
  })
})()