public class Dosen extends PegawaiTetap {

    private static final double TUNJANGAN_FUNGSIONAL = 0.10;

    public Dosen(String nip, String nama, double gajiPokok) {

        super(nip, nama, gajiPokok, 0);
    }

    @Override
    public double hitungGaji() {
        return super.hitungGaji() * (1 + TUNJANGAN_FUNGSIONAL);
    }

    @Override
    public String jenis() {
        return "DOSEN";
    }
}