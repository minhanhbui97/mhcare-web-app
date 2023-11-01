<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Recommended Books</h1>
    <?php
    $books = [
        "Do Androids Dream of Electric Sheep",
        "The Langoliers",
        "Hail Mary"
    ];

    ?>

    <ul>
        <!-- 6. Arrays -->
        <?php
        // A way to write for loop
        foreach ($books as $book) {
            // Recommended to use {} in order to separate the var name
            echo "<li><div>{$book}™</div></li>";
        }

        ?>


        <!-- (Recommended) Another way to write for loop  -->
        <?php foreach ($books as $book) : ?>
            <!-- Short way to write echo -->
            <li>
                <?= $book ?>
            </li>

        <?php endforeach; ?>
    </ul>


    <p>
        <?= $books[2] ?>
    </p>


    <h1>

        Associative array: associate value with a key
    </h1>
    <ul>
        <?php
        $book_infos = [
            [
                'name' => 'Do Androids Dream of Electric Sheep',
                'author' => 'Philip K. Dick',
                'releaseYear' => 1968,
                'purchaseUrl' => 'http://example.com'
            ],
            [
                'name' => 'Project Hail Mary',
                'author' => 'Andy Weir',
                'releaseYear' => 2021,
                'purchaseUrl' => 'http://example.com'
            ],
            [
                'name' => 'The Martian',
                'author' => 'Andy Weir',
                'releaseYear' => 2011,
                'purchaseUrl' => 'http://example.com'
            ],
        ];

        function filterByAuthor($books, $author): array
        {

            $filteredBooks = [];

            foreach ($books as $book) {
                if ($book['author'] === $author) {

                    $filteredBooks[] = $book;  # append to list
                }
            }

            return $filteredBooks;

        }

        ?>
    </ul>

    
    <!-- Diplay list of books, can add filter logic if needed -->
    <ul>
        <?php foreach ($book_infos as $book_info) : ?>
            <!-- filter by condition -->
            <?php if ($book_info['author'] == 'Andy Weir') : ?>
                <li>
                    <!-- adding href to string -->
                    <a href="<?= $book_info['purchaseUrl'] ?>">

                        <!-- access value by key -->
                        <?= $book_info['name'] ?> (<?= $book_info['releaseYear'] ?>)
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <!-- Display list of books, use filter function -->
    <p>
        <?php foreach (filterByAuthor($book_infos, 'Philip K. Dick') as $book_info) : ?>
            <li>
                <a href="<?= $book_info['purchaseUrl'] ?>">
                    <?= $book_info['name'] ?> (<?= $book_info['releaseYear'] ?>) - By <?= $book_info['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </p>


</body>

</html>