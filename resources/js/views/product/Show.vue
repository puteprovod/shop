<template>
    <main>
        <!--Start Shop Details Breadcrumb-->
        <div class="shop-details-breadcrumb wow fadeInUp animated overflow-hidden ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="shop-details-inner">
                            <ul class="shop-details-menu">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Product Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Shop Details Breadcrumb-->
        <!--Start Shop Details Top-->
        <section class="shop-details-top two ">
            <div class="container" v-if="product">
                <div class="row mt--30">
                    <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
                        <div class="single-product-box one">
                            <div class="big-product single-product-one slider-for">
                                <div v-for="productImage in product.product_images">
                                    <div class="single-item"><img :src="productImage.url" alt="">
                                        <div class="ptag" v-if="discount>0"><span class="one">-{{ discount }}% </span>
                                        </div>
                                        <a @click.prevent="addToWL(product)" href="#0"
                                           class="love"><div id="like">&#9734;</div></a>
                                    </div>
                                </div>
                            </div>
                            <div class="navholder">
                                <div class="product-slicknav single-product-one-nav slider-nav">
                                    <div v-for="productImage in product.product_images"> <span class="single-item"> <img
                                        :src="productImage.url" alt=""> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
                        <div class="shop-details-top-right ">
                            <div class="shop-details-top-right-content-box">
                                <div class="shop-details-top-review-box">
                                    <div class="shop-details-top-review">
                                        <ul>
                                            <li><i class="flaticon-star-1"></i></li>
                                            <li><i class="flaticon-star-1"></i></li>
                                            <li><i class="flaticon-star-1"></i></li>
                                            <li><i class="flaticon-star-1"></i></li>
                                            <li><i class="flaticon-star-1"></i></li>
                                        </ul>
                                        <p>(2 Reviews)</p>
                                    </div>
                                </div>
                                <div class="shop-details-top-title">
                                    <h3>{{ product.title }}</h3>
                                </div>
                                <ul class="shop-details-top-info">
                                    <li>{{ product.description }}</li>
                                </ul>
                                <div class="shop-details-top-price-box">
                                    <h3>${{ product.price }}.00
                                        <del v-if="product.old_price>0">{{ product.old_price }}.00</del>
                                    </h3>
                                </div>
                                <div class="shop-details-top-color-sky-box">
                                    <h4 class="mb-0">Colors:</h4>
                                    <ul class="color-option">
                                        <li v-for="color in product.colors"><a class="color-option-single-details"
                                                                               :style="`background: #${color.title}`"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-quantity">
                                    <h4>Quantity</h4>
                                    <div class="product-quantity-box d-flex align-items-center flex-wrap">
                                        <div class="qty mr-2">
                                            <div class="qtySelector text-center"> <span class="decreaseQty"><i
                                                class="flaticon-minus"></i> </span> <input type="number"
                                                                                           class="qtyValue" value="1"/>
                                                <span class="increaseQty"> <i
                                                    class="flaticon-plus"></i> </span></div>
                                        </div>
                                        <div class="product-quantity-check"><i class="flaticon-select"></i>
                                            <p>In Stock</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-details-top-order-now"><i class="flaticon-point"></i>
                                    <p>Order Now, Only {{ product.count }} Left !</p>
                                </div>
                                <div class="shop-details-top-cart-box-btn">
                                    <button @click.prevent="addToCart(product, 999)" class="btn--primary style2 "
                                            type="submit">Add to Cart
                                    </button>
                                </div>
                                <div class="shop-details-top-free-shipping"><i class="flaticon-shipping"></i>
                                    <p>SPENT <span>$399.00</span> MORE FOR FREE SHIPPING</p>
                                </div>
                                <div class="shop-details-top-social-box">
                                    <p>Share:</p>
                                    <ul class="ps-1 social_link d-flex align-items-center">
                                        <li><a href="https://www.facebook.com/" class="active" target="_blank"><i
                                            class="flaticon-facebook-app-symbol"></i></a></li>
                                        <li><a href="https://www.youtube.com/" target="_blank"><i
                                            class="flaticon-youtube"></i></a></li>
                                        <li><a href="https://twitter.com/" target="_blank"><i
                                            class="flaticon-twitter"></i></a></li>
                                        <li><a href="https://www.instagram.com/" target="_blank"><i
                                            class="flaticon-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div class="checked-box">
                                    <form>
                                        <div class="form-group"><input type="checkbox" id="html"> <label for="html">I
                                            agree with all company terms & condition</label></div>
                                    </form>
                                </div>
                                <div class="shop-details-top-buy-now-btn"><a href="#" class="btn--primary">Buy It
                                    Now</a></div>
                                <p class="shop-details-top-product-delivery">This product estimated delivery within
                                    <span>10 days</span></p>
                                <ul class="shop-details-top-category-tags">
                                    <li>Category: <span>{{ product.category.title }}</span></li>
                                    <li>Tags: <span>
                    <template v-for="(tag,index) in product.tags">
                  {{ tag.title + ((index < product.tags.length - 1) ? ', ' : '') }}
                    </template>
                  </span></li>
                                </ul>
                                <ul class="shop-details-top-feature">
                                    <li>
                                        <div class="icon"><i class="flaticon-portfolio"></i></div>
                                        <div class="text">
                                            <p>Money back guarantee</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="flaticon-truck"></i></div>
                                        <div class="text">
                                            <p>Free Shipping & Return</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="flaticon-security"></i></div>
                                        <div class="text">
                                            <p>Comportable Support</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Shop Details Top-->
        <!-- productdrescription-tabStart -->
        <section class="product pt-60 pb-60 wow fadeInUp overflow-hidden ">
            <div class="container">
                <div class="row wow fadeInUp animated">
                    <div class="col-12">
                        <ul class="nav product-details-nav nav-one nav-pills justify-content-center" id="pills-tab-two"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active"
                                        id="pills-description-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-description"
                                        type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                                    Description
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-review-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab"
                                        aria-controls="pills-review" aria-selected="false"> Review
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div v-if="product" class="row wow fadeInUp animated">
                    <div class="tab-content" id="pills-tabContent-two">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                             aria-labelledby="pills-description-tab">
                            <div class="product-drescription">
                                <h4> Product Details:</h4>
                                <p>{{ product.content }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-additional" role="tabpanel"
                             aria-labelledby="pills-additional-tab">
                            <div class="product-drescription">
                                <p class="pt-0"> Assertively conceptualize parallel process improvements through user
                                    friendly colighue to action items. Interactively antidos cultivate interdependent
                                    customer service without clicks-and-mortar e-services. Proactively cultivate go
                                    forward testing procedures with accurate quality vectors. Globally aiembrace ethical
                                    functionalities via empowered scenarios. Phosfluorescently restore highly efficient
                                    opportunities and client-focused infomediaries. Enthusiastically transition
                                    multidisciplinary outside the box thinking without premium networks. Progressive
                                    supply clicks-and-mortar human capital through enterprise-wide web services.
                                    Objectivey bester provide access to extensible processes better than more
                                    qulification dumber there stoaling through 24/365 solutions. </p>
                                <ul class="drescription-list">
                                    <li> 1. Adipiscing hac cubilia, fermentum ipsum auctor parturient tempus lobortis
                                        fermentum.
                                    </li>
                                    <li> 2. Euismod disagree soler imperdiet vehicula pede eros ipsum cras mi feugiat.
                                    </li>
                                    <li> 3. Rhoncus consequat phasellus donec suspendisse scelerisque facilisis gravida
                                        porttitor turpis.
                                    </li>
                                    <li> 4. Consequat phasellus donec suspendisse scelerisque facilisis gravida
                                        porttitor turpis.
                                    </li>
                                    <li> 5. Consequat phasellus donec suspendisse scelerisque facilisis gravida
                                        porttitor
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-sizechart" role="tabpanel"
                             aria-labelledby="pills-sizechart-tab">
                            <div class="product-drescription">
                                <div class="size-chirt">
                                    <h4>Size Guide</h4>
                                    <p class="pt-0"> Assertively conceptualize parallel process improvements through
                                        user friendly colighue to action items. </p>
                                    <div class="size-tabble">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th>Size</th>
                                                <th>XXS - XS</th>
                                                <th>XS - S</th>
                                                <th>S - M</th>
                                                <th>M - L</th>
                                                <th>L - XL</th>
                                                <th>XL - XXL</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>ARGENTINA</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                                <td>12</td>
                                            </tr>
                                            <tr>
                                                <td>BOLIVIA</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>13</td>
                                            </tr>
                                            <tr>
                                                <td>COLOMBIA</td>
                                                <td>26</td>
                                                <td>28</td>
                                                <td>30</td>
                                                <td>32</td>
                                                <td>34</td>
                                                <td>36</td>
                                            </tr>
                                            <tr>
                                                <td>China</td>
                                                <td>34</td>
                                                <td>36</td>
                                                <td>38</td>
                                                <td>40</td>
                                                <td>42</td>
                                                <td>44</td>
                                            </tr>
                                            <tr>
                                                <td>MEXICO</td>
                                                <td>32</td>
                                                <td>34</td>
                                                <td>36</td>
                                                <td>38</td>
                                                <td>40</td>
                                                <td>42</td>
                                            </tr>
                                            <tr>
                                                <td>JAMAICA</td>
                                                <td>40</td>
                                                <td>42</td>
                                                <td>44</td>
                                                <td>46</td>
                                                <td>48</td>
                                                <td>50</td>
                                            </tr>
                                            <tr>
                                                <td>MEXICO</td>
                                                <td>32</td>
                                                <td>34</td>
                                                <td>36</td>
                                                <td>38</td>
                                                <td>40</td>
                                                <td>42</td>
                                            </tr>
                                            <tr>
                                                <td>Australia</td>
                                                <td>6</td>
                                                <td>8</td>
                                                <td>10</td>
                                                <td>12</td>
                                                <td>14</td>
                                                <td>16</td>
                                            </tr>
                                            <tr>
                                                <td>USA</td>
                                                <td>33</td>
                                                <td>44</td>
                                                <td>55</td>
                                                <td>66</td>
                                                <td>77</td>
                                                <td>88</td>
                                            </tr>
                                            <tr>
                                                <td>UK</td>
                                                <td>6</td>
                                                <td>8</td>
                                                <td>10</td>
                                                <td>12</td>
                                                <td>14</td>
                                                <td>16</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Pant</strong></td>
                                                <td>22-23</td>
                                                <td>24-25</td>
                                                <td>26-27</td>
                                                <td>28-29</td>
                                                <td>30-31</td>
                                                <td>32-33</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="product-drescription">
                                <div class="review-single pt-0 hed">
                                    <div class="ratting"><i class="flaticon-star-1"></i> <i
                                        class="flaticon-star-1"></i> <i class="flaticon-star-1"></i> <i
                                        class="flaticon-star-1"></i> <i class="flaticon-star-1"></i> <span
                                        class="ps-2">BASED ON 100 REVIEW</span></div>
                                </div>
                                <div class="review-single">
                                    <div class="left">
                                        <div class="ratting"><i class="flaticon-star-1"></i> <i
                                            class="flaticon-star-1"></i> <i class="flaticon-star-1"></i> <i
                                            class="flaticon-star-1"></i> <i class="flaticon-star-1"></i></div>
                                        <h6>Vary Good quality Theme <span>Raul Bates on January 28, 2022</span></h6>
                                        <p> Assertively conceptualize parallel process improvements through user
                                            friendly colighue to action items. Interactively antidos cultivate
                                            interdependent customer service without clicks-and-mortar e-services. </p>
                                    </div>
                                    <a href="#0" class="right-box"> Report this Comments </a>
                                </div>
                                <div class="review-single">
                                    <div class="left">
                                        <div class="ratting"><i class="flaticon-star-1"></i> <i
                                            class="flaticon-star-1"></i> <i class="flaticon-star-1"></i> <i
                                            class="flaticon-star-1"></i> <i class="flaticon-star-1"></i></div>
                                        <h6> Amazing Theme <span>Kurt Morgan on January 28, 2022</span></h6>
                                        <p> Assertively conceptualize parallel process improvements through user
                                            friendly colighue to action items. Interactively antidos cultivate
                                            interdependent customer service without clicks-and-mortar e-services. </p>
                                    </div>
                                    <a href="#0" class="right-box">Report this Comments </a>
                                </div>
                                <div class="review-from-box mt-30">
                                    <h6>Write a Review</h6>
                                    <form action="#" class="review-from">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="ratting-box">
                                                    <p> RATING </p>
                                                    <div class="ratting"><i class="flaticon-star-1"></i> <i
                                                        class="flaticon-star-1"></i> <i class="flaticon-star-1"></i>
                                                        <i class="flaticon-star-1"></i> <i class="flaticon-star-1"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="name">NAME</label> <input
                                                    type="text" id="name" class="form-control"
                                                    placeholder="David Warner"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="number">Number</label> <input
                                                    type="text" id="number" class="form-control"
                                                    placeholder="Phone Number"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="email"> Email </label> <input
                                                    type="text" id="email" class="form-control"
                                                    placeholder="support@gmail.com"></div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group"><label for="namee"> REVIEW TITLE</label> <input
                                                    type="text" id="namee" class="form-control"
                                                    placeholder="Give your review title"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group m-0"><label for="email">BODY OF REVIEW (1500)
                                                </label> <textarea
                                                    placeholder="Write Your Comments Here"></textarea></div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn--primary style2 ">Submit Review
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- productdrescription-tab End -->
        <!-- recent-products Start -->
        <section class="recent-products pt-60 pb-120 overflow-hidden wow fadeInUp">
            <div class="container" v-if="products[0]">
                <div class="row">
                    <div class="col-12 wow fadeInUp animated">
                        <div class="section-head text-center">
                            <h2>Recent Products </h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-30 wow fadeInUp animated">
                    <div class="catagory-slider">
                        <div v-for="prod in products" class="products-grid-one">
                            <div class="products-grid-one__product-image">
                                <div class="products-grid-one__badge-box"><span class="bg_base badge new ">New</span>
                                </div>
                                <a href="shop-details-1.html" class="d-block products-grid__image_holder"> <img
                                    :src="prod.product_images[0].url" alt="Alt"> </a>
                            </div>
                            <div class="products-grid__content"><a @click.prevent="addToCart(prod, 1)" href="#"
                                                                   class="products-grid__cart-btn btn--primary"> <span
                                class="one"> Add to Cart </span>
                                <span class="two"> <i class="flaticon-shopping-cart"> </i> </span> </a>
                                <div class="ratting"><i class="flaticon-star"></i> <i class="flaticon-star"></i> <i
                                    class="flaticon-star"></i> <i class="flaticon-star"></i> <i
                                    class="flaticon-star"></i></div>
                                <h5 class="product_name"><a href="shop-details-1.html">{{ prod.title }} </a></h5>
                                <div class="price d-flex align-content-center justify-content-center">
                                    <p>${{ prod.price }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- recent-products End -->
    </main>
</template>

<script>
export default {
    name: "products.show",
    data() {
        return {
            product: null,
            discount: 0,
            products: []
        }
    },
    mounted() {
        this.getRandomProducts(5);
        this.getProduct(this.$route.params.id);
        this.scrollToTop()
        $(document).trigger('changed')
    },
    methods: {
        drawWLIcon(product) {
            const wishList = JSON.parse(localStorage.getItem('wishlist'));
            let returnVar = false;
            if (wishList)
                wishList.forEach(wishProduct => {
                    if (product.id === wishProduct.id)
                        returnVar = true;
                })
            if (!returnVar) {
                document.getElementById('like').innerHTML = '&#9734;';
            } else {
                document.getElementById('like').innerHTML = '&#9733;';
            }
        },
        addToWL(product) {
            let wishList = localStorage.getItem('wishlist')
            let newProduct = [{
                'id': product.id
            }];
            if (!wishList) {
                localStorage.setItem('wishlist', JSON.stringify(newProduct))
            } else {
                wishList = JSON.parse(wishList)
                let i = 0;
                wishList.forEach(productInCart => {
                    if (productInCart.id === product.id) {
                        wishList.splice(i, 1)
                        newProduct = null
                    }
                    i++;
                })
                Array.prototype.push.apply(wishList, newProduct);
                localStorage.setItem('wishlist', JSON.stringify(wishList))
            }
            this.drawWLIcon(product)
            this.$emit('addwl')
        },
        addToCart(product, qty) {
            let cart = localStorage.getItem('cart')
            if (qty === 999) {
                qty = $('.qtyValue').val()
                $('.qtyValue').val(1)
            }
            let newProduct = [{
                'id': product.id,
                'image_url': product.product_images[0].url,
                'title': product.title,
                'price': product.price,
                'qty': Number(qty)
            }];
            if (!cart) {
                localStorage.setItem('cart', JSON.stringify(newProduct))
            } else {
                cart = JSON.parse(cart)
                cart.forEach(productInCart => {
                    if (productInCart.id === product.id) {
                        productInCart.qty = Number(productInCart.qty) + Number(qty)
                        newProduct = null
                    }
                })
                Array.prototype.push.apply(cart, newProduct);
                localStorage.setItem('cart', JSON.stringify(cart))
                this.$emit('addcart')
            }
        },
        scrollToTop() {
            window.scrollTo(0, 0);
        },
        calculateDiscount() {
            if (this.product.old_price > 0) {
                this.discount = Math.round((1 - this.product.price / this.product.old_price) * 100);
            } else {
                this.discount = 0;
            }
        },
        getProduct(id) {
            this.axios.post(`/api/products/${id}`)
                .then(res => {
                    this.product = res.data.data
                    this.calculateDiscount()
                }).finally(v => {
                this.drawWLIcon(this.product)
                $(document).trigger('changed')
            })
        },
        getRandomProducts(count) {
            this.axios.post('/api/products/random', {
                'count': count
            })
                .then(res => {
                    this.products = res.data.data
                }).finally(v => {
                $(document).trigger('changed')
            })
        }
    }
}
</script>

<style scoped>

</style>
