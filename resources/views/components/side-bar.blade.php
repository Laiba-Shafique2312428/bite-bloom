 <aside class="sidebar">
            <div class="sidebar-header">
                <h2 class="sidebar-title">Filters</h2>
                <button class="clear-filters" onclick="clearAllFilters()">Clear all (0)</button>
            </div>

            <!-- Cuisine Filter -->
            <div class="filter-section">
                <button class="filter-header" onclick="toggleSection(this)">
                    <h3>Cuisine Type</h3>
                    <span class="chevron rotated">▼</span>
                </button>
                <div class="filter-options active">
                    <div class="filter-option">
                        <input type="checkbox" id="italian" onchange="updateFilterCount()">
                        <label for="italian">Italian</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="japanese" onchange="updateFilterCount()">
                        <label for="japanese">Japanese</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="mexican" onchange="updateFilterCount()">
                        <label for="mexican">Mexican</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="indian" onchange="updateFilterCount()">
                        <label for="indian">Indian</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="thai" onchange="updateFilterCount()">
                        <label for="thai">Thai</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="french" onchange="updateFilterCount()">
                        <label for="french">French</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="chinese" onchange="updateFilterCount()">
                        <label for="chinese">Chinese</label>
                    </div>
                     <div class="filter-option">
                        <input type="checkbox" id="seasonal" onchange="updateFilterCount()">
                        <label for="chinese">Seasonal</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="mediterranean" onchange="updateFilterCount()">
                        <label for="mediterranean">Mediterranean</label>
                    </div>
                </div>
            </div>

            <!-- Price Range Filter -->
            <div class="filter-section">
                <button class="filter-header" onclick="toggleSection(this)">
                    <h3>Price Range</h3>
                    <span class="chevron rotated">▼</span>
                </button>
                <div class="filter-options active">
                    <div class="filter-option">
                        <input type="checkbox" id="price1" onchange="updateFilterCount()">
                        <label for="price1">$</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="price2" onchange="updateFilterCount()">
                        <label for="price2">$$</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="price3" onchange="updateFilterCount()">
                        <label for="price3">$$$</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="price4" onchange="updateFilterCount()">
                        <label for="price4">$$$$</label>
                    </div>
                </div>
            </div>

            <!-- Rating Filter -->
            <div class="filter-section">
                <button class="filter-header" onclick="toggleSection(this)">
                    <h3>Rating</h3>
                    <span class="chevron rotated">▼</span>
                </button>
                <div class="filter-options active">
                    <div class="filter-option">
                        <input type="checkbox" id="rating5" onchange="updateFilterCount()">
                        <label for="rating5">5+ Stars</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="rating4" onchange="updateFilterCount()">
                        <label for="rating4">4+ Stars</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="rating3" onchange="updateFilterCount()">
                        <label for="rating3">3+ Stars</label>
                    </div>
                </div>
            </div>

            <!-- Dietary Filter -->
            <div class="filter-section">
                <button class="filter-header" onclick="toggleSection(this)">
                    <h3>Dietary</h3>
                    <span class="chevron rotated">▼</span>
                </button>
                <div class="filter-options active">
                    <div class="filter-option">
                        <input type="checkbox" id="vegetarian" onchange="updateFilterCount()">
                        <label for="vegetarian">Vegetarian</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="vegan" onchange="updateFilterCount()">
                        <label for="vegan">Vegan</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="glutenfree" onchange="updateFilterCount()">
                        <label for="glutenfree">Gluten-Free</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="halal" onchange="updateFilterCount()">
                        <label for="halal">Halal</label>
                    </div>
                    <div class="filter-option">
                        <input type="checkbox" id="kosher" onchange="updateFilterCount()">
                        <label for="kosher">Kosher</label>
                    </div>
                </div>
            </div>

            <button class="apply-btn">Apply Filters</button>
        </aside>