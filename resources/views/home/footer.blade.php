  <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Arkargo Logo" style="height: 60px; margin-bottom: 20px;">
                    <h4>Arkargo</h4>
                    <p>1M Floor, Core 2, Advanced Cargo Centre Kuala Lumpur International Airport, 64000, Sepang Selangor, Malaysia</p>
                    <p><strong>Office Hour:</strong>support@arkargo.org</p>
                    <p><strong>After Office Hour:</strong> support@arkargo.org</p>
                </div>
                <div class="col-md-2">
                    <h4>E-services</h4>
                    <ul>
                        <li><a href="#">Cargo Booking</a></li>
                        <li><a href="#">Shipment Tracking</a></li>
                        <li><a href="#">Flight Schedule</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>Products</h4>
                    <ul>
                        <li><a href="#">Arkargo SEND</a></li>
                        <li><a href="#">MH° Centigrade</a></li>
                        <li><a href="#">Halal Logistics</a></li>
                        <li><a href="#">MASLift</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Ground Handling</a></li>
                        <li><a href="#">Express Handling</a></li>
                        <li><a href="#">Security Handling</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>&nbsp;</h4>
                    <ul>
                        <li><a href="#">Global Mail</a></li>
                        <li><a href="#">Charters</a></li>
                        <li><a href="#">Arkargo Logistics</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="partner-logos">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/malaysia-airlines.png" alt="Malaysia Airlines">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/maswings.png" alt="MASwings">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/firefly.png" alt="Firefly">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/amal.png" alt="AMAL">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/enrich.png" alt="Enrich">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/journify.png" alt="Journify">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/maskargo.png" alt="MASkargo">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/aerodarat.png" alt="AeroDarat">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/mab-academy.png" alt="MAB Academy">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/mab-engineering.png" alt="MAB Engineering">
                <img src="https://www.maskargo.com/wp-content/uploads/2024/03/mag.png" alt="MAG">
                <div class="ms-auto d-flex gap-3">
                    <a href="#" style="color: var(--mas-blue); font-size: 30px;"><i class="bi bi-facebook"></i></a>
                    <a href="#" style="color: var(--mas-blue); font-size: 30px;"><i class="bi bi-instagram"></i></a>
                    <a href="#" style="color: var(--mas-blue); font-size: 30px;"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>Arkargo © Copyright 2025</p>
                <div class="footer-links">
                    <a href="#">Legal Notice</a>
                    <span>•</span>
                    <a href="#">Privacy Policy</a>
                    <span>•</span>
                    <a href="#">Corporate Governance</a>
                    <span>•</span>
                    <a href="#">About This Site</a>
                    <span>•</span>
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Tab switching functionality
        function showTab(tabId) {
            // Hide all tabs
            document.querySelectorAll('.tab-pane').forEach(tab => {
                tab.style.display = 'none';
            });
            
            // Remove active class from all buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Show selected tab
            document.getElementById(tabId).style.display = 'block';
            
            // Add active class to clicked button
            event.target.closest('.tab-btn').classList.add('active');
        }
        
        // Set today's date as default
        document.getElementById('date').valueAsDate = new Date();
    </script>
</body>
</html>
