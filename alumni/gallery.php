<?php 
include 'admin/db_connect.php'; 
?>
<style>
    /* Styling for the Masthead (Header) */
    header.masthead, header.masthead:before {
        min-height: 23vh !important;
        height: 23vh !important;
    }

    /* Main Content Container */
    .content-container {
        padding: 30px;
        text-align: center;
    }

    /* Grid Layout for Images */
    .image-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* Two images per row */
        gap: 20px;
        margin-top: 20px;
        justify-items: center; /* Center the images in the grid */
    }

    /* Individual Card Styling */
    .image-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        max-width: 400px; /* Set a max width for consistent sizing */
        width: 100%;
    }

    .image-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    /* Image Styling */
    .image-card img {
        width: 100%;
        height: 250px; /* Set a fixed height for consistency */
        object-fit: cover; /* Ensure the image fills the card properly */
    }

    /* Description Styling */
    .image-card .card-content {
        padding: 15px;
        text-align: center;
    }

    .image-card h5 {
        font-size: 18px;
        margin: 0;
        font-weight: bold;
    }

    .image-card p {
        font-size: 14px;
        color: #555;
        margin: 5px 0 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .image-grid {
            grid-template-columns: 1fr; /* Stack images in one column for small screens */
        }

        .image-card img {
            height: 200px; /* Adjust height for smaller screens */
        }

        .image-card h5 {
            font-size: 16px; /* Reduce font size on mobile */
        }
    }
</style>

<header class="masthead">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end mb-4 page-title">
                <h3 class="text-white"><font face="serif"><b>Moments of VVCE</b></font></h3>
                <hr class="divider my-4" />
            </div>
        </div>
    </div>
</header>

<div class="content-container">
    <h4>Gallery</h4>
    <p>Explore some of the best moments captured at VVCE.</p>
    <div class="image-grid">
        <?php
        // Fetch images and descriptions from the database
        $fpath = 'admin/assets/uploads/gallery';
        $gallery = $conn->query("SELECT * FROM gallery ORDER BY id DESC LIMIT 4"); // Fetch only 4 images

        // Loop through the gallery records
        while ($row = $gallery->fetch_assoc()):
            $img = $fpath . '/' . $row['image_path']; // Image path from the database
        ?>
        <div class="image-card">
            <img src="<?php echo $img; ?>" alt="Gallery Image">
            <div class="card-content">
                <h5><?php echo ucwords($row['about']); ?></h5> <!-- Title from the database -->
                <p>Shared moments of joy and creativity.</p> <!-- Placeholder description -->
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>


