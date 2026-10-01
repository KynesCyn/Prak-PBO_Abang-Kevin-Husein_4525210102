<?php
declare(strict_types=1);

abstract class BangunDatar
{
    public function __construct(private readonly string $nama) {}

    abstract public function luas(): float;
    abstract public function keliling(): float;

    public function getNama(): string { return $this->nama; }

    public function __toString(): string
    {
        return sprintf('%-12s luas=%10.2f  keliling=%10.2f',
            $this->nama, $this->luas(), $this->keliling());
    }
}

class Lingkaran extends BangunDatar
{
    public function __construct(private readonly float $jariJari)
    {
        parent::__construct('Lingkaran');
        // TODO 1: tolak jari-jari <= 0.
        if ($jariJari <= 0) {
            throw new InvalidArgumentException("Jari-jari harus > 0");
        }
    }

    // TODO 2: lengkapi. Gunakan M_PI, bukan 3.14.
    public function luas(): float     { return M_PI * ($this->jariJari ** 2); }
    public function keliling(): float { return 2 * M_PI * $this->jariJari; }

    public function getJariJari(): float { return $this->jariJari; }
}

class Persegi extends BangunDatar
{
    public function __construct(private readonly float $sisi)
    {
        parent::__construct('Persegi');
        // TODO 1: tolak sisi <= 0.
        if ($sisi <= 0) {
            throw new InvalidArgumentException("Sisi harus > 0");
        }
    }

    // TODO 2: lengkapi.
    public function luas(): float     { return $this->sisi ** 2; }
    public function keliling(): float { return 4 * $this->sisi; }
}

// TODO Langkah 2: buat kelas Segitiga (tiga sisi, rumus Heron).
//                 Tolak konstruksi bila ketiga sisi tidak membentuk segitiga.
class Segitiga extends BangunDatar 
{
    public function __construct(
        private readonly float $a, 
        private readonly float $b, 
        private readonly float $c
    ) {
        parent::__construct('Segitiga');
        if ($a <= 0 || $b <= 0 || $c <= 0) {
            throw new InvalidArgumentException("Sisi harus > 0");
        }
        if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
            throw new InvalidArgumentException("Tidak membentuk segitiga");
        }
    }

    public function luas(): float {
        $s = $this->keliling() / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    public function keliling(): float {
        return $this->a + $this->b + $this->c;
    }
}

// TODO Langkah 4: buat kelas Trapesium.
class Trapesium extends BangunDatar 
{
    public function __construct(
        private readonly float $sisiAtas,
        private readonly float $sisiBawah,
        private readonly float $tinggi,
        private readonly float $sisiMiring1,
        private readonly float $sisiMiring2
    ) {
        parent::__construct('Trapesium');
        if ($sisiAtas <= 0 || $sisiBawah <= 0 || $tinggi <= 0 || $sisiMiring1 <= 0 || $sisiMiring2 <= 0) {
            throw new InvalidArgumentException("Sisi dan tinggi harus > 0");
        }
    }

    public function luas(): float {
        return 0.5 * ($this->sisiAtas + $this->sisiBawah) * $this->tinggi;
    }

    public function keliling(): float {
        return $this->sisiAtas + $this->sisiBawah + $this->sisiMiring1 + $this->sisiMiring2;
    }
}