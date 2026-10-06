function ProductionSummary({ summary }) {
    const cards = [
        {
            label: 'Total Production',
            value: summary.total,
        },
        {
            label: 'OK',
            value: summary.ok,
        },
        {
            label: 'Reject',
            value: summary.reject,
        },
        {
            label: 'Yield',
            value: `${summary.yield}%`,
        },
        {
            label: 'Reject Rate',
            value: `${summary.reject_rate}%`,
        },
    ];

    return (
        <section>
            <h2 className="mb-3 text-lg font-semibold text-gray-900">
                Production Summary
            </h2>

            <div className="grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
                {cards.map((card) => (
                    <div
                        key={card.label}
                        className="rounded-xl border border-gray-200 bg-white p-5 shadow-sm"
                    >
                        <p className="text-sm font-medium text-gray-500">
                            {card.label}
                        </p>

                        <p className="mt-2 text-3xl font-bold text-gray-900">
                            {card.value}
                        </p>
                    </div>
                ))}
            </div>
        </section>
    );
}

export default ProductionSummary;