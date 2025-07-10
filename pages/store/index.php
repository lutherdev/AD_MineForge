<!-- store.php -->
<section class="store-container" id="inventory">
  <div class="store-header">
    <h1>Miner's Ware</h1>
    <div class="store-filters">
      <button class="menu-btn active" data-category="all">All</button>
      <button class="menu-btn" data-category="ore">Ore</button>
      <button class="menu-btn" data-category="tools">Tools</button>
      <button class="menu-btn" data-category="gear">Gear</button>
    </div>
  </div>

  <div class="store-main">
    <div class="sidebar">
      <div class="cart-image-wrapper">
        <aside class="cart-box">
          <h2>Cart</h2>
          <ul id="cart-items"></ul>
          <div class="total">Total: ₱<span id="cart-total">0</span></div>
          <div class='cart-buttons'>
            <div class='btn-cancel'><button id="checkout-btn">CHECKOUT</button></div>
            <div class='btn-cancel'><button id="cancel-btn">CANCEL</button></div>
          </div>
        </aside>
      </div>

      <div class="cart-image-wrapper">
        <aside class="cart-box2">
          <h2>SAMPLE BOX</h2>
          <ul>
            <li>Miner's Helmet<span>₱150</span></li>
            <li>Gold Nugget<span>₱120</span></li>
          </ul>
          <div class="total">Total: ₱270</div>
        </aside>
      </div>
    </div>

    <div class="products-image-wrapper">
      <div class="products-grid">
        <!-- Product cards will go here -->
      </div>
    </div>
  </div>
</section>
