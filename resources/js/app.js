import "./bootstrap"

// Simple animations without GSAP dependency
document.addEventListener("DOMContentLoaded", () => {
  // Animate elements on scroll
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("animate-fade-in")
        observer.unobserve(entry.target)
      }
    })
  }, observerOptions)

  // Observe book cards
  document.querySelectorAll(".book-card").forEach((card) => {
    observer.observe(card)
  })

  // Observe stat cards
  document.querySelectorAll(".stat-card").forEach((card) => {
    observer.observe(card)
  })

  // Hero content animation
  const heroContent = document.querySelector(".hero-content")
  if (heroContent) {
    setTimeout(() => {
      heroContent.classList.add("animate-slide-up")
    }, 200)
  }
})

// Cart functionality
const cart = JSON.parse(localStorage.getItem("cart")) || []

function updateCartCount() {
  const cartCount = document.getElementById("cart-count")
  if (cartCount) {
    cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0)
  }
}

function addToCart(bookId, title, price, image) {
  const existingItem = cart.find((item) => item.id === bookId)
  if (existingItem) {
    existingItem.quantity += 1
  } else {
    cart.push({
      id: bookId,
      title: title,
      price: price,
      image: image,
      quantity: 1,
    })
  }
  localStorage.setItem("cart", JSON.stringify(cart))
  updateCartCount()

  // Show toast notification
  showToast("Book added to cart!", "success")
}

function showToast(message, type = "info") {
  // Remove existing toasts
  const existingToasts = document.querySelectorAll(".toast")
  existingToasts.forEach((toast) => toast.remove())

  const toast = document.createElement("div")
  toast.className = `toast toast-top toast-end z-50`
  toast.innerHTML = `
        <div class="alert alert-${type}">
            <span>${message}</span>
        </div>
    `
  document.body.appendChild(toast)
  setTimeout(() => toast.remove(), 3000)
}

// Initialize cart count on page load
updateCartCount()

// Make functions globally available
window.addToCart = addToCart
window.showToast = showToast

// Theme toggle functionality
function toggleTheme() {
  const html = document.documentElement
  const currentTheme = html.getAttribute("data-theme")
  const newTheme = currentTheme === "dark" ? "light" : "dark"
  html.setAttribute("data-theme", newTheme)
  localStorage.setItem("theme", newTheme)
}

// Load saved theme
const savedTheme = localStorage.getItem("theme") || "light"
document.documentElement.setAttribute("data-theme", savedTheme)

window.toggleTheme = toggleTheme
