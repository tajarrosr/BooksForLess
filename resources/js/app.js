import "./bootstrap"
import { gsap } from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger"

gsap.registerPlugin(ScrollTrigger)

// Initialize animations
document.addEventListener("DOMContentLoaded", () => {
  initAnimations()
  initCart()
  initTheme()
})

function initAnimations() {
  // Hero animation
  gsap.fromTo(".hero-content", { opacity: 0, y: 50 }, { opacity: 1, y: 0, duration: 1, ease: "power2.out" })

  // Book cards animation
  gsap.fromTo(
    ".book-card",
    { opacity: 0, y: 30, scale: 0.9 },
    {
      opacity: 1,
      y: 0,
      scale: 1,
      duration: 0.6,
      stagger: 0.1,
      ease: "power2.out",
      scrollTrigger: {
        trigger: ".book-card",
        start: "top 80%",
        toggleActions: "play none none reverse",
      },
    },
  )

  // Feature cards animation
  gsap.fromTo(
    ".feature-card",
    { opacity: 0, y: 30 },
    {
      opacity: 1,
      y: 0,
      duration: 0.8,
      stagger: 0.2,
      ease: "power2.out",
      scrollTrigger: {
        trigger: ".feature-card",
        start: "top 80%",
      },
    },
  )

  // Category cards animation
  gsap.fromTo(
    ".category-card",
    { opacity: 0, scale: 0.8 },
    {
      opacity: 1,
      scale: 1,
      duration: 0.5,
      stagger: 0.1,
      ease: "back.out(1.7)",
      scrollTrigger: {
        trigger: ".category-card",
        start: "top 80%",
      },
    },
  )
}

// Cart functionality
const cart = JSON.parse(localStorage.getItem("cart")) || []

function initCart() {
  updateCartCount()
}

function updateCartCount() {
  const cartCount = document.getElementById("cart-count")
  if (cartCount) {
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0)
    cartCount.textContent = totalItems
    cartCount.style.display = totalItems > 0 ? "inline-flex" : "none"
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
  showToast("Book added to cart!", "success")

  // Add button animation
  const button = event.target
  button.classList.add("animate-scale-in")
  setTimeout(() => button.classList.remove("animate-scale-in"), 400)
}

function showToast(message, type = "info") {
  const existingToasts = document.querySelectorAll(".toast-notification")
  existingToasts.forEach((toast) => toast.remove())

  const toast = document.createElement("div")
  toast.className = `toast-notification fixed top-4 right-4 z-50 px-6 py-4 rounded-xl shadow-lg transform translate-x-full transition-transform duration-300`

  const bgColor = type === "success" ? "bg-green-500" : type === "error" ? "bg-red-500" : "bg-primary-500"
  toast.classList.add(bgColor, "text-white")

  toast.innerHTML = `
    <div class="flex items-center space-x-3">
      <i class="fas fa-${type === "success" ? "check-circle" : type === "error" ? "exclamation-circle" : "info-circle"}"></i>
      <span class="font-medium">${message}</span>
    </div>
  `

  document.body.appendChild(toast)

  // Animate in
  setTimeout(() => toast.classList.remove("translate-x-full"), 100)

  // Animate out and remove
  setTimeout(() => {
    toast.classList.add("translate-x-full")
    setTimeout(() => toast.remove(), 300)
  }, 3000)
}

function initTheme() {
  const savedTheme = localStorage.getItem("theme") || "light"
  document.documentElement.setAttribute("data-theme", savedTheme)
}

function toggleTheme() {
  const html = document.documentElement
  const currentTheme = html.getAttribute("data-theme")
  const newTheme = currentTheme === "dark" ? "light" : "dark"
  html.setAttribute("data-theme", newTheme)
  localStorage.setItem("theme", newTheme)
}

// Make functions globally available
window.addToCart = addToCart
window.showToast = showToast
window.toggleTheme = toggleTheme
