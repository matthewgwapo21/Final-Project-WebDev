const data = [
    {
      id: 1,
      name: "Invicta Men's Pro Diver",
      img: "https://m.media-amazon.com/images/I/71e04Q53xlL._AC_UY879_.jpg",
      price: 74,
      cat: "Dress",
    },
    {
      id: 11,
      name: "Rolex Oyster Perpetual",
      img: "rolex.avif",
      price: 268,
      cat: "Luxury",
    },
    {
      id: 2,
      name: "Timex Men's Expedition Scout ",
      img: "https://m.media-amazon.com/images/I/91WvnZ1g40L._AC_UY879_.jpg",
      price: 40,
      cat: "Sport",
    },
    {
      id: 3,
      name: "Breitling Superocean Heritage",
      img: "https://m.media-amazon.com/images/I/61hGDiWBU8L._AC_UY879_.jpg",
      price: 200,
      cat: "Luxury",
    },
    {
      id: 4,
      name: "G-Shock Full Metal 2100 Series",
      img: "gshock.avif",
      price: 68,
      cat: "Sport",
    },
    {
      id: 5,
      name: "Garmin Venu Smartwatch ",
      img: "https://m.media-amazon.com/images/I/51kyjYuOZhL._AC_SL1000_.jpg",
      price: 74,
      cat: "Casual",
    },
    {
      id: 6,
      name: "Ben 10 Omnitrix",
      img: "omnitrix.jpg",
      price: 20,
      cat: "Sport",
      },
    {
      id: 7,
      name: "Casio Full Silver",
      img: "casio.avif",
      price: 35,
      cat: "Casual",
    },
    {
      id: 8,
      name: "Seiko Cocktail Time",
      img: "seiko.png",
      price: 88,
      cat: "Dress",
    },
    {
      id: 9,
      name: "Patek Philippe Grandmaster Chime ",
      img: "Patek.webp",
      price: 3100,
      cat: "Luxury",
    },
    {
      id: 10,
      name: "Michael Kors Gold-Tone",
      img: "michael1.png",
      price: 870,
      cat: "Dress",
    },
    {
      id: 11,
      name: "LIGE Classic Diver",
      img: "LIGE.webp",
      price: 43,
      cat: "Casual",
    },
  ];
  
  const productsContainer = document.querySelector(".products");
  const searchInput = document.querySelector(".search");
  const categoriesContainer = document.querySelector(".cats");
  const priceRange = document.querySelector(".priceRange");
  const priceValue = document.querySelector(".priceValue");
  
  const displayProducts = (filteredProducts) => {
    productsContainer.innerHTML = filteredProducts
      .map(
        (product) =>
          `
         <div class="product">
            <img
            src=${product.img}
            alt=""
            />
            <span class="name">${product.name}</span>
            <span class="priceText">$${product.price}</span>
            <button class="buyButton" data-product-id="${product.id}">Buy</button>
          </div>
      `
      )
      .join("");
  
    const buyButtons = document.querySelectorAll(".buyButton");
    buyButtons.forEach((button) => {
      button.addEventListener("click", (e) => {
        window.location.href = "paid2.html";
      });
    });
  };
  displayProducts(data);
  
  searchInput.addEventListener("keyup", (e) => {
    const value = e.target.value.toLowerCase();
  
    if (value) {
      displayProducts(
        data.filter((item) => item.name.toLowerCase().indexOf(value) !== -1)
      );
    } else {
      displayProducts(data);
    }
  });
  
  const setCategories = () => {
    const allCats = data.map((item) => item.cat);
    const categories = [
      "All",
      ...allCats.filter((item, i) => {
        return allCats.indexOf(item) === i;
      }),
    ];
  
    categoriesContainer.innerHTML = categories
      .map(
        (cat) =>
          `
        <span class="cat">${cat}</span>
      `
      )
      .join("");
  
    categoriesContainer.addEventListener("click", (e) => {
      const selectedCat = e.target.textContent;
  
      selectedCat === "All"
        ? displayProducts(data)
        : displayProducts(data.filter((item) => item.cat === selectedCat));
    });
  };
  
  const setPrices = () => {
    const priceList = data.map((item) => item.price);
    const minPrice = Math.min(...priceList);
    const maxPrice = Math.max(...priceList);
  
    priceRange.min = minPrice;
    priceRange.max = maxPrice;
    priceRange.value = maxPrice;
    priceValue.textContent = "$" + maxPrice;
  
    priceRange.addEventListener("input", (e) => {
      priceValue.textContent = "$" + e.target.value;
      displayProducts(data.filter((item) => item.price <= e.target.value));
    });
  };
  
  setCategories();
  setPrices();