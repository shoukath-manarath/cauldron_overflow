use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

final class Category
{
// ...

/**
* @ORM\Column(name="name", type="string")
*/
private ?string $name = null;

/**
* @ORM\OneToMany(targetEntity="BlogPost", mappedBy="category")
*/
private Collection $blogPosts;

public function __construct()
{
$this->blogPosts = new ArrayCollection();
}

public function getBlogPosts(): Collection
{
return $this->blogPosts;
}
}