class FaSearch {
  constructor() {
    this.headerSearch = document.querySelector('.b-header-search')
    this.searchInput = this.headerSearch.querySelector('.b-search')
    this.sections = document.body.classList.contains('b-home-page') 
      ? document.querySelectorAll('.b-home-content > div') 
      : document.querySelectorAll('.b-content .content')
    this.searchBar = document.querySelector('.search-bar')
    this.searchBarInput = this.searchBar.querySelector('input')
    this.searchBarPrev = this.searchBar.querySelector('.search-bar__nav--prev')
    this.searchBarNext = this.searchBar.querySelector('.search-bar__nav--next')
    this.currentTarget = null
    this.currentPosition = 0
    this.searchTerm = ''
    this.res = []

    this.onInput = this.onInput.bind(this)
    this.prev = this.prev.bind(this)
    this.next = this.next.bind(this)
    this.clearResults = this.clearResults.bind(this)
  }

  init() {
    this.currentPosition = 0
    this.disableNav()
  }

  onInput(event) {
    this.res = []
    this.currentPosition = 0
    this.searchTerm = event.target.value
    this.searchInput.value = this.searchBarInput.value = this.searchTerm

    if (this.searchTerm.length <= 3) {
      Array.from(this.sections).forEach((section) => {
        this.removeAllDataSearchAttributes(section)
      })
      return
    }

    Array.from(this.sections).forEach((section) => {
      const sectionText = section.textContent.toLowerCase()
      const containsTerm = sectionText.includes(this.searchTerm)

      if (containsTerm) {
        const matchingElement = this.findMatchingElement(section)
        if (matchingElement && !matchingElement.closest('.modal')) {
          matchingElement.setAttribute('data-fa-search', this.searchTerm)
          this.res.push(matchingElement)
        }
      } else {
        this.removeAllDataSearchAttributes(section)
      }
    })

    // this.displayResults()
    if (this.res.length)
      this.showResults()

      this.checkNav()
  }

  findMatchingElement(parent) {
    const iterator = document.createNodeIterator(
      parent,
      NodeFilter.SHOW_TEXT,
      (node) => {
        return node.nodeValue.toLowerCase().includes(this.searchTerm)
          ? NodeFilter.FILTER_ACCEPT
          : NodeFilter.FILTER_REJECT
      }
    )

    let currentNode
    while ((currentNode = iterator.nextNode())) {
      return currentNode.parentElement
    }

    return null
  }

  removeAllDataSearchAttributes(parent) {
    for (const child of parent.children) {
      child.removeAttribute('data-fa-search')
      this.removeAllDataSearchAttributes(child)
    }
  }

  displayResults() {
    const resultsContainer = document.getElementById('resultsContainer')
    resultsContainer.innerHTML = ''

    this.res.forEach((section) => {
      const resultItem = document.createElement('div')
      resultItem.dataset.block = section.id
      resultItem.textContent = this.searchTerm
      resultItem.addEventListener('click', () => {
        this.scrollToResult(section)
      })
      resultsContainer.appendChild(resultItem)
    })
  }

  showResults() {
    this.searchInput.blur()
    setTimeout(() => {
      document.querySelector('.search-bar input').focus()
    }, 10);

    this.searchBar.classList.add('active')
    this.headerSearch.classList.remove('active')

    setTimeout(() => {
      this.scrollToResult(this.res[0])
      this.currentTarget = this.res[0]
    }, 100)
  }

  clearResults() {
    this.searchBar.classList.remove('active')
    this.searchInput.value = this.searchBarInput.value = ''
    Array.from(this.sections).forEach((section) => {
      this.removeAllDataSearchAttributes(section)
    })
    this.currentPosition = 0
  }

  scrollToResult(target) {
    target.scrollIntoView({ behavior: 'smooth', block: 'center' })
    this.checkNav()
  }

  prev() {
    let i = this.currentPosition - 1
    if (this.res[i]) {
      this.currentPosition--
      this.currentTarget = this.res[this.currentPosition]
      this.scrollToResult(this.currentTarget)
    }
  }

  next() {
    let i = this.currentPosition + 1
    if (this.res[i]) {
      this.currentPosition++
      this.currentTarget = this.res[this.currentPosition]
      this.scrollToResult(this.currentTarget)
    }
  }

  checkNav() {
    // console.info(this.res)
    // console.log('POSITION: ' + this.currentPosition + ' | LENGTH: ' + this.res.length)

    if (this.res.length) {
      this.searchBarPrev.classList.remove('disable')
      this.searchBarNext.classList.remove('disable')
    } else {
      this.disableNav()
    }

    if (this.currentPosition == this.res.length - 1) {
      this.searchBarNext.classList.add('disable')
    } 
    if (this.currentPosition == 0) {
      this.searchBarPrev.classList.add('disable')
    }
  }
  
  disableNav() {
    this.searchBarPrev.classList.add('disable')
    this.searchBarNext.classList.add('disable')
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.querySelector('.b-search')
  const searchBar = document.querySelector('.search-bar')
  const hamburger = document.querySelector('.hamburger')
  const searchBarInput = document.querySelector('.search-bar input')
  const searchBarClear = document.querySelectorAll('[data-fa-search-clear]')
  const prevSearch = document.querySelector('.search-bar__nav--prev:not(.disable)')
  const nextSearch = document.querySelector('.search-bar__nav--next:not(.disable)')
  const mobileSearchIcon = document.querySelector('.mobile-search')

  const FSearch = new FaSearch()
  searchInput.addEventListener('input', FSearch.onInput)
  searchBarInput.addEventListener('input', FSearch.onInput)
  searchBarInput.addEventListener('keyup', function (e) {
    if (e.code.toLowerCase() == 'enter')
      FSearch.next()
  })
  prevSearch.addEventListener('click', function(e) {
    if (e.target.classList.contains('disable')) return
    FSearch.prev()
  })
  nextSearch.addEventListener('click', function(e) {
    if (e.target.classList.contains('disable')) return
    FSearch.next()
  })

  if (window.innerWidth <= 992) {
    mobileSearchIcon.addEventListener('click', function() {
      hamburger.click()

      searchBar.classList.add('active')
      FSearch.init()
      setTimeout(() => {
        searchBarInput.focus()
      }, 10);
    })

  }

  for(const closeIcon of searchBarClear) {
    closeIcon.addEventListener('click', FSearch.clearResults)
  }
})